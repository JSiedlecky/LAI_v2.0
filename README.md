#### LAI_v2.0
Projekt nowej strony gliwickiego LAI. Stworzone przez D. Szołtysek, M. Łamasz, J. Siedlecki.

---



### Super funkcjonalności:
- ładujemy rzeczy po scrollu
	- http://www.templatemonster.com/demo/58352.html)
- parallax
- one-page całość
- breadcrumbs?
- animacje like:
	- http://www.dunckelfeld.de/
- ładne animacje ładowania
- glyphicons & fontawesome
- responsywna
- favicon
- logowanie email/hasło
- newslettery
- meta tagi
- teamcolor?


#### Stopka:
- zapisz się na newsletter
- kontakt
	- adres
	- telefon
	- mail
	- do kogo?
- menu vertical
	- aktualna strona
	- pozostałe podstrony
- copyright


#### Aktualności
- ładuje się 5 postów (ogłoszeń)
- button 'starsze' ładuje następne 5
- posty:
	- tytuł
	- zajawka
	- data
	- 'czytaj więcej'
- posty oddzielone liniami


#### Cisco
- 4 zdjęcia (na semestry)
- opisy
- w góry co to jest itd
- na dole podsumowanie


#### WWW
- o co chodzi z kursem, czym się zajmujemy
- slider zdjęcia (5/8 zdjęć)
	- sam się przesuwa
	- manualne przesuwanie
	- tracking aka kropki
- html css - czym się zajmują itd


#### Zgłoszenie
- formularz
	- imie
	- nazwisko
	- mail
	- telefon
	- jaki kurs
	- (dla cisco)terminy zajęć (sob-niedz, pon-pt)
	- (dla cisco) 2/4 semestry
- jakiś modal
- 3 selecty:
	- nie rozwijane
	- kiedy zajęcia
	- tryb zajęć
	- rodzaj zajęć
	- jeśli wybrane aplikacje
- dodatkowe informacje
- reset + wyślij
- coś aka: *'zastrzegamy sobie prawo do odpowiedzi tylko na wybrane zgłoszenia'*


#### Akademia
- w góry wypas zdjęcie
- coś o akademi, od kiedy, co oferuje itd
- 2 sekcje:
	- cisco
	- tworzenie aplikacji
	- w sekcjach linki do podstron
- zdjęcie (z zoom-in like: http://www.templatemonster.com/demo/58365.html)
- ilość uczniów napis
- 'zgłoś się' -> do zgłoszenia



---



### Baza danych

- dane logowania
	- login
	- hash
	- mail
	- lastLogin
- newsletter - dane:
	- imie
	- nazwisko
	- mail
- zgłoszenia
	- imie
	- nazwisko
	- mail
	- telefon
	- jaki kurs
	- (dla cisco)terminy zajęć (sob-niedz, pon-pt)
	- (dla cisco) 2/4 semestry
- aktualności
	- tytuł
	- zajawka
	- data
	- treść

#### Mniej więcej struktua bazy :v:
![zdjecie bazy](http://i.imgur.com/Hi6w145.png)


---

### Notkatki

- dokończyć newsletter w stópce (action)(formularz powinien działać :v)
- dynamiczne menu (podświetlanie obecjenj karty)
- dopytać o adresy email i telefony
- przy rozdzielczości niższej niż 1200px dodaje się dziwny padding/margin z prawej i nie wiem co to jest. do naprawy :v
- nowe zgłoszenie = powiadomienie na email do Szołtyska
- tworzenie wirtryn www - uzupełni wlaściwym tekstem, dodac właściwą grafike

### Admin stuff

- Left navi:
	- nowy wpis do aktualności
	- wyślij newsletter
	- ustawienia
	- wyloguj
	- copyright LAI 2016

- Top navi:
	- Grupy (do 15 osob)
		- dodaj grupę
	- Nowi uczniowie
		- przydziel grupę
		- dane kontatkowe
	- Uczniowie
		- płatnosci
		- statusy
		- wyszukiwarka


### Grafika

- Nagłówek strony > 2375x200  (tam gdzie obecnie placeholder)    | mobilne:  768x129
- Akademia, ładny paralax > 1200x215   | mobilne:   738x138
- Akademia, "ZAPISZ SIĘ NA ZAJĘCIA", napis + ładne tło > 1200x200  (może być mniejszy)
- Cisco, 4 grafiki tematyczne (4 semestry)  >  600 x 200
- WWW, min. 3 grafiki tematyczne > 1500x200
- Do tego przydało by się z jedno jakieś ładne logo Cisco / ew. ZSTI; nie musi być duże
- ? może jakieś lekkie tło

Grafiki mogą być większe, byle z zachowaniem skali.

Wszystko najlepiej w .png + koniecznie oryginały w .psd / .xcf żeby można było podocinać itd.
