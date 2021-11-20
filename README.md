# Lukit Test Catalog
Prosty katalog produktów z podziałem na kategroie i podkategorie.

## Opis

Przygotować prosty katalog produktów z podziałem na kategorie i podkategorie. 
Produkty zawierające jedno zdjęie i opis powinny mieć możliwość umieszczania w różnych kategoriach i podkategoriach.

Projekt powinien składać się z dwóch części: **frontend** i **backend**.
Katalog powinien być responsywny zbudowany na wybranym frameworku UI.

### Frontend

Na froncie widoczna jest lista kategorii głównych z możliwością rozwinięcia drzewa i podglądu (wejscia do) pod-kategorii oraz lista produktów.
Podgląd wybranej kategorii zawęża listę produktów do tych dostępnych w aktualnie wybranej.
Domyślnie na stronie głównej wyświetlać karty wszystkich produktów. 
Każda karta produktu powinna wyświetlać nazwę, zdjęcie, krótki opis oraz cenę.
Lista produktów i kategorii posortowana po nazwie ASC.

### Backend

W backendzie dwie sekcje - kategorie i produkty gdzie jest możliwść listowania, dodawania, edycji i kasowania danych.
Edycja produktu i kategorii powinna aktualizować datę aktualizacji, która jest widoczona na liście.
Przypisywanie produktu do kategorii może odbywać się na stronie edycji produktu lub w dodatkowej akcji.

Lista produktów i kategorii domyśłnie posortowana po nazwie ASC. Możliwe sortowania list po nazwie i dacie aktualizacji.

### Encje

#### Kategoria

- nazwa (100 znaków)
- kategoria nadrzędna (relacja do Kategoria)
- data aktualizacji (data i godzina)

#### Produkt

- nazwa (100 znaków)
- opis (255 znaków)
- zdjęcie (plik jpg)
- data aktualizacji (data i godzina)
- cena (liczba)

## Stack

- Symfony 5 + Twig
- Mysql/MariaDb + Doctrine
- Frontend - wybrany Responsive Framework np: Bootstrap lub Semantic UI
- Backend - również responsywny, można posiłkować się dostępnymi w Symfony generatorami CRUD

## Założenia

- W kodzie nazwy metod, encji, dokumentacja, komentarze po angielsku
- Przygotwać zestaw danych startowych - fixtures
- Proste testy funkcjonalne i unity w miarę potrzeby
- Załączyć instrukcję/opis instalacji i odpalenia projektu - osobny plik readme
- Github - działamy na prywatnych forkach tego repozytorium i wszelkie zmiany wrzucamy jako Pull Requesty
- Treść commitów tak jak komentarze piszemy po angielsku
- Pytania i inne kwestie - w sekcji Issues tego repozytorium, możemy też tam wrzucać prośby o poprawki lub objaśnienia, dyskusje itp...
