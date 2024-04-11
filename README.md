# Projekt Zdarzenia IoT

## Opis

Projekt jest w wersji początkowej i składa się z dwóch głównych części: frontendu (Angular) i backendu, które obecnie nie są ze sobą połączone. Frontend i backend są rozwijane równolegle, ale integracja nie została jeszcze zaimplementowana z powodu ograniczeń czasowych.

## Dane

Dane używane w projekcie są obecnie dodane na sztywno w kodzie frontendu, co pozwala na prezentację interfejsu użytkownika i interakcji bez potrzeby posiadania działającego backendu.

## Lista Eventów

Lista zdarzeń znajduje się w komponencie `EventListComponent`, który jest dostępny pod ścieżką `/events`. Lista prezentuje zdarzenia takie jak usterki urządzeń, przekroczenia temperatury oraz odblokowania drzwi.

## Szczegóły Eventów

Szczegóły poszczególnych zdarzeń mogą być przeglądane poprzez kliknięcie przycisku "Szczegóły" przy każdym zdarzeniu w liście. Szczegóły są wyświetlane w komponencie `EventDetailsComponent`, dostępnym poprzez dynamiczne ścieżki typu `/events/:id`.

## Przykładowe Wywołanie cURL

Aby zasymulować interakcję z backendem (który obecnie nie istnieje), poniżej znajduje się przykładowe wywołanie cURL, które w przyszłości będzie można wykorzystać do pobierania danych z backendu:

```bash
curl -X POST http://localhost:8000/api/event \
-H "Content-Type: application/json" \
-d '{
  "eventType": "doorUnlocked",
  "deviceId": "device789",
  "eventDate": "2020-01-03T00:00:00Z",
  "unlockDate": "2020-01-03T01:00:00Z"
}'
```