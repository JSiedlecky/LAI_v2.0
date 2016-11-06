$(document).ready(function(){

    //HIDE/SHOW LEFT SIDEBAR
    function hide_sidebar(duration, ajax){
        var me = $('.hideshow_sidebar').find('i');
        var left = $('#left-sidebar');
        var container = $('#container');

        me.removeClass('fa-chevron-left');
        me.addClass('fa-chevron-right');

        width = $(window).width() - ($(window).width()/100);

        left.animate({
            left:"-9%"
        },duration);
        container.animate({
            width: width,
            left: "1%"
        },duration);

        data_show = 0;

        if(ajax) $.ajax({
            method: "POST",
            url: "ajax/manage_lm.php",
            data: "display_lm=" + data_show,
            complete: function(raw_data){
                console.log(raw_data.responseText);
            }
        });
    }
    function show_sidebar(duration, ajax) {
        var me = $('.hideshow_sidebar').find('i');
        var left = $('#left-sidebar');
        var container = $('#container');

        me.removeClass('fa-chevron-right');
        me.addClass('fa-chevron-left');

        left.animate({
            left: 0
        }, duration);
        container.animate({
            width: "90%",
            left: "10%"
        }, duration);

        data_show = 1;

        if(ajax) $.ajax({
            method: "POST",
            url: "ajax/manage_lm.php",
            data: "display_lm="+data_show,
            complete: function(raw_data){
                console.log(raw_data.responseText);
            }
        });
    }

    var data_show = $('#left-sidebar').attr('data-show');

    if(data_show == 0) hide_sidebar(0);
    else show_sidebar(1);

    $('.hideshow_sidebar').on('click touch', function (){
        var me = $(this).find('i');

        if(me.hasClass('fa-chevron-left')){
            hide_sidebar(300, true);
        }else{
            show_sidebar(300, true);
        }
    });

    //BEAUTIFY WHAT IS TO HARD TO DO WITH PHP OR IM TOO LAZY
    $('.applications tbody tr td:nth-child(10)').each(function(index){
      if($(this).text().trim() == 'Nie rozpatrzono.') $(this).css('background-color','rgba(231, 76, 60, 0.5)');
    });

    //APPLICATIONS TABLE ANIMATIONS AND ADDITIONAL USAGE
  /*  $('.applications tbody tr td:not(:last-of-type)').on('click touch', function(e){
      var checkbox_input = $(this).parent().find('input[type="checkbox"]');
      var is_checked = checkbox_input.prop('checked');
      checkbox_input.prop('checked',!is_checked);
    });*/

    //GROUPS
    $('.group_section').each(function(){
      RandomizeBorderColor($(this));
    });

    var table = $('.group').find('thead, tbody').hide(0);

    $('.group_section').click(function(){
      var tb = $(this).parent().find('tbody');
      var th = $(this).parent().find('thead');

      if(tb.css('display') == 'table-row-group') {
        tb.hide('slow');
        th.hide('slow');
      }
      else {
        tb.show('slow');
        th.show('slow');
      }

    });

    $('.search-form input, .search-form select').on('change',function(){
      if($(this).val() != ''){
        if($(this).val() == 'cisco' || $(this).attr('name') == 'groupyears' || $(this).attr('name') == 'groupdays'){
          $('.search-form input').not($(this)).not('input[type="submit"]').not('input[type="hidden"]').prop('disabled',true);
          $('.search-form select').prop('disabled', false);
        } else {
        $('.search-form input, .search-form select').not($(this)).not('input[type="submit"]').not('input[type="hidden"]').prop('disabled',true);
        }
      } else {
        $('.search-form input, .search-form select').prop('disabled',false);
      }
    });

    $('select[name="groupmodule"]').on('change', function(){
      if($(this).val() == 'www'){
        $('select').not($(this)).prop('disabled', true);
        $('select').not($(this)).val(null);
        $('select').not($(this)).prop('required', false);
      } else {
        $('select').prop('disabled',false);
        $('select').prop('required',true);
      }
    });

    $('.group_options').click(function(){
      var options = $(this).next('.option_select');
      options.css('display',(options.css('display') == 'none' ? 'block' : 'none'));
    });

    $('.option_select').on('change', function(){
      var val = $(this).val();
      var group_id = $(this).attr('data-groupid');

      if(val == 'modify'){
        //var host = 'http://lai.com/admin/index.php?page=edit&type=group&id='+group_id;
        var host = 'http://lai.com/admin/index.php?page=edit&type=group&id='+group_id;

        window.location.href = host;
      }

      if(val == 'delete'){
        if(confirm('Czy na pewno usunąć grupę?')){
          $.ajax({
            method:'get',
            url:'ajax/group.actions.php',
            data:'action=delete&id='+group_id,
            complete: function(data){
              if(data.responseText == 'OK') location.reload();
              else alert('Wystąpił błąd, spróbuj później.');
            }
          });
        }
      }

    });

    if($('select[name="groupmodule"]').val() == 'www'){
      $('select[name="groupyears"]').prop('required', false).prop('disabled', true);
      $('select[name="groupdays"]').prop('required', false).prop('disabled', true);
    }

    $('select[name="groupmodule"]').on('change', function(){
      if($(this).val() == 'www'){
        $('select[name="groupyears"]').prop('required', false).prop('disabled', true);
        $('select[name="groupdays"]').prop('required', false).prop('disabled', true);
      } else {
        $('select[name="groupyears"]').prop('required', true).prop('disabled', false);
        $('select[name="groupdays"]').prop('required', true).prop('disabled', false);
      }
    });

    $('i.delete-student').parent('td').css({'cursor':'pointer'});
    $('i.delete-student').parent('td').on('click', function() {
      var studentid = $(this).parent('tr').find('td').first().text();
      var gmodule = $('input[name="originalmodule"]').val();
      console.log(gmodule);

      if(confirm('Czy napewno usunąć ucznia z tej grupy?')){
        $.ajax({
          method:'get',
          url:'ajax/group.actions.php',
          data:'action=deletestudentfromgroup&module='+gmodule+'&groupid='+getQueryVariable('id')+'&studentid='+studentid,
          complete: function(data){
            if(data.responseText == 'OK') location.reload();
            else {console.log(data.responseText);alert('Wystąpił błąd, spróbuj później.')};
          }
        })
      }
    });
/*XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX PAYMENTS XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX*/
    $('.payment-actions').on('click', function(){
      var action = $(this).attr('data-action');
      var me = $(this).parent('td').parent('tr').find('td');
      var id = me[0].innerText;

      if(action == "modify"){
        var host = "http://lai.com/admin/index.php?page=edit&type=payment&payment="+id;

        window.location.href = host;
      }

      if(action == "delete"){
        if(confirm('Czy na pewno usunąć płatność?')){
          $.ajax({
            method:'get',
            url:'ajax/payment.actions.php',
            data:'action=delete&id='+id,
            complete: function(data){
              if(data.responseText == 'OK') location.reload();
              else alert('Wystąpił błąd, spróbuj później.');
            }
          });
        }
      }
    });

    $('#addrowofform').on('click', function(){
      var row = $('.rowofform')[0].innerHTML;
      row = '<div class="rowofform">'+row+'</div>';

      $('.allrowsofforms').append(row);
      $('select[name="payment_for"]').last().find('option').remove();
      $('select[name="payment_for"]').last().append('<option value="">Wybierz</option>');
      $('select[name="payer"]').on('change', function(){
        var val = $(this).val();
        var select = $(this).parent('div').parent('form').parent('div').find('select[name="payment_for"]')

        if(val != ''){
          select.attr('disabled', false);
          select.attr('required', true);

          $.ajax({
            method:'get',
            url:'ajax/payment.actions.php',
            data:'action=selectpayment&student='+val,
            complete: function(data) {
              var tmp = data.responseText;
              var arr = tmp.split(',');
              select.text('');
              var final = '<option value="">Wybierz</option>';
              for(i = 0; i < arr.length; i++){
                arr[i] = arr[i].split('_')[1];
              }
              if(arr[0] !== '') arr[0] = 'CISCO_'+arr[0];
              if(arr[1] !== '') arr[1] = 'WWW_'+arr[1];

              if(arr[1] === '') arr.splice(1,1);
              if(arr[0] === '') arr.splice(0,1);


              for(i = 0; i < arr.length; i++){
                final += '<option value="'+arr[i]+'">'+arr[i]+'</option>';
              }
              select.append(final);
              arr = [];
              final = '';
            }
          });
        } else {
          select.val('');
          select.attr('disabled', true);
          select.attr('required', false);
        }
      });

    });

    $('select[name="payment_for"]').prop('disabled', true);

    $('select[name="payer"]').on('change', function(){
      var val = $(this).val();
      var select = $(this).parent('div').parent('form').parent('div').find('select[name="payment_for"]')

      if(val != ''){
        select.attr('disabled', false);
        select.attr('required', true);
        select.text('');

        $.ajax({
          method:'get',
          url:'ajax/payment.actions.php',
          data:'action=selectpayment&student='+val,
          complete: function(data) {
            var tmp = data.responseText;
            var arr = tmp.split(',');
            for(i = 0; i < arr.length; i++){
              arr[i] = arr[i].split('_')[1];
            }
            if(arr[0] !== '') arr[0] = 'CISCO_'+arr[0];
            if(arr[1] !== '') arr[1] = 'WWW_'+arr[1];

            if(arr[1] === '') arr.splice(1,1);
            if(arr[0] === '') arr.splice(0,1);

            var final = '<option value="">Wybierz</option>';
            for(i = 0; i < arr.length; i++){
              final += '<option value="'+arr[i]+'">'+arr[i]+'</option>';
            }
            select.append(final);
            arr = [];
            final = '';
          }
        });
      } else {
        select.val('');
        select.attr('disabled', true);
        select.attr('required', false);
      }
    });

    $('#addpayment').on('click', function(){
      var allrows = $('.rowofform');
      var data = {};

      if(validatePayments(allrows)){
        allrows.each(function(i){
          data[i] = {
            'amount'      : $(this).find('input[name="amount"]').val(),
            'payment_for' : $(this).find('select[name="payment_for"]').val(),
            'payer'       : $(this).find('select[name="payer"]').val(),
            'payment_date': $(this).find('input[name="payment_date"]').val(),
            'additional'  : $(this).find('textarea[name="additional"]').val()
          }
        });

        $.ajax({
          url: 'ajax/payment.actions.php?action=add',
          method: 'post',
          data: data,
          complete: function(data){
            if(data.responseText === 'OK'){
              alert('Pomyślnie dodano płatności.');
              redirect('http://lai.com/admin/index.php?page=payments');
            } else {
              alert('Wystąpił błąd, spróbuj później.');
              redirect('http://lai.com/admin/index.php?page=payments');
            }
          }
        });

      } else alert('Wypełnij wszystkie pola!');
    });
});
