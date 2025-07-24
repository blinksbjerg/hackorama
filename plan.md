# Hackorama Udviklingsplan

## Projekt Oversigt
Hackorama er et udviklingsframework til Shoporama, der gør det muligt at udvikle og teste Shoporama temaer lokalt.

## Status (FÆRDIG!)

### Implementeret Funktionalitet
- ✅ Grundlæggende struktur oprettet
- ✅ API integration implementeret og testet
- ✅ Alle Safe* wrapper klasser fra Shoporama implementeret
- ✅ Smarty 4 integration med Shoporama's custom delimiters (<{ }>)
- ✅ Alaska2 tema fuldt funktionelt
- ✅ Global.html wrapper pattern implementeret korrekt
- ✅ Alle hovedsider fungerer: forside, produkter, kategorier, kurv, søgning
- ✅ Billede skalering og caching implementeret
- ✅ Cookie-baseret kurv funktionalitet med JSON storage
- ✅ Error reporting konfigureret til at suppresse warnings
- ✅ SafePdfFile wrapper tilføjet for PDF håndtering
- ✅ Alle template undefined array key warnings rettet
- ✅ Test scripts fjernet
- ✅ Customer og Shipping endpoints implementeret
- ✅ Rabatkode funktionalitet implementeret
- ✅ Customer login med password='password' konvention

### Implementerede Wrapper Klasser
- **SafeProduct** - 150+ metoder implementeret
- **SafeCategory** - Fuld funktionalitet
- **SafeImage** - Billede håndtering med skalering
- **SafePage** - Side visning
- **SafeWebshop** - Webshop data og indstillinger
- **SafeProductProfile** - Produkt profiler og attributter
- **SafePdfFile** - PDF fil håndtering
- **SafeCustomer** - Kunde data og login
- **SafeShipping** - Forsendelsesmetoder
- **SafeVoucher** - Rabatkode håndtering
- **DefaultSafe** - Base klasse for alle wrappers
- **BasketManager** - Kurv håndtering med cookies og rabatkoder

## Arkitektur

```
hackorama/
├── src/
│   ├── API/              # API Client til Shoporama REST
│   ├── Core/             # Kerne funktionalitet
│   │   ├── Autoloader.php
│   │   ├── Hackorama.php
│   │   ├── Router.php
│   │   ├── Template.php
│   │   ├── Logger.php
│   │   └── BasketManager.php
│   └── Wrappers/         # Safe wrapper klasser
├── cache/                # JSON cache og Smarty compile
├── themes/               # Shoporama temaer
├── logs/                 # Error og debug logs
└── setup.php            # Konfiguration
```

## Konfiguration

```php
return [
    'api' => [
        'key' => 'ce10d0cfd16cd1cf98c4f47cdcad7b15',
        'host' => 'https://localshoporama.dk',
    ],
    'theme' => [
        'path' => __DIR__ . '/themes/Alaska2',
    ],
    'local_url' => 'http://localhost:8080',
];
```

## Næste Skridt (Fremtidige Forbedringer)

1. **Checkout Flow**
   - Implementer address, shipping og payment sider
   - Tilføj ordre bekræftelse

2. **Bruger Funktionalitet**
   - Login/logout
   - Bruger profil
   - Ordre historik

3. **Blog System**
   - Blog posts
   - Kategorier
   - Kommentarer

4. **Avancerede Features**
   - Voucher/rabatkode system
   - Ønskeliste funktionalitet
   - Produkt anmeldelser
   - Newsletter integration

## Kendte Begrænsninger

Se `missing.md` for komplet liste over manglende API endpoints og funktionalitet i Shoporama REST API.

## Test og Vedligeholdelse

- Server: `php -S localhost:8080 router.php`
- Debug: http://localhost:8080/debug.php
- Logs: `logs/hackorama.log`
- Cache: Slet `cache/` mappen for at tvinge ny data hentning

## Tekniske Detaljer

- PHP 7.4+ påkrævet
- Smarty 4.5.3 inkluderet
- cURL til API kommunikation
- JSON baseret data storage
- Cookie baseret session håndtering