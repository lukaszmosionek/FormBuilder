# 📚 Dokumentacja projektu: Dynamiczny Formularz w Laravel
## 📖 Opis projektu
Projekt umożliwia dynamiczne generowanie formularzy HTML z konfigurowalnym zestawem pól i obsługę przesyłania danych w aplikacji Laravel.

Główne funkcjonalności:
 - Dynamiczne budowanie formularzy (FormBuilder)
 - Obsługa przesyłania danych metodą POST (FormController)
 - Walidacja danych po stronie backendu
 - Komunikaty o błędach i sukcesie
 - Jednostkowe i integracyjne testy

🛠️ Instalacja
1. Wprowadź następujące komendy:
 - git clone https://github.com/lukaszmosionek/FormBuilder.git
 - php artisan serve


## ⚡ Szybki start
Odwiedź stronę:
 - http://localhost:8000/formularz

Formularz będzie zawierał:

 - Pole Imię
 - Pole Email
 - Pole Opis
 - Przycisk "Wyślij"

Po wysłaniu danych otrzymasz odpowiedni komunikat:

 - Sukces: jeśli dane są poprawne
 - Błędy: jeśli np. Email jest nieprawidłowy lub Imię za krótkie

## 🧪 Testowanie

Wymagania:
 - PHPUnit (instalowany domyślnie z Laravelem)
 - wersja PHP 8.2.12

Uruchamianie testów:
 - php artisan test

Dostępne testy:
 - Jednostkowy,	tests/Unit/FormBuilderTest.php, Testowanie generowania formularzy
 - Integracyjny, tests/Feature/FormControllerTest.php, Testowanie przesyłania i walidacji formularza
