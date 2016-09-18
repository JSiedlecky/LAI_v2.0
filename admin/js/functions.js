function RandomizeBorderColor(selector) {
  var random = Math.floor((Math.random() * 5) + 1);
  var color = "#";

  switch(random){
    case 1: color += "27ae60"; break;
    case 2: color += "e67e22"; break;
    case 3: color += "2980b9"; break;
    case 4: color += "e74c3c"; break;
    case 5: color += "9b59b6"; break;
    default:color += "CCCCCC"; break;
  }

  selector.css('border-color',color);
}
