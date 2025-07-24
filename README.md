# Hackorama - Local Shoporama Development Framework

Hackorama er et lokalt udviklingsframework til Shoporama, der gør det muligt at udvikle og teste Shoporama temaer uden at skulle deploye til produktion.

## Status

✅ **Funktionalitet implementeret!**

- API integration virker og henter data fra Shoporama
- Wrapper klasser efterligner Shoporama's Safe* klasser
- Smarty 4 template engine integreret med Shoporama's custom delimiters (<{ }>)
- Alaska2 tema fungerer fuldt ud
- Global.html wrapper pattern implementeret korrekt
- Alle hovedsider virker: forside, produkter, kategorier, kurv, søgning
- Kurv funktionalitet implementeret (tilføj til kurv virker)
- Billede skalering implementeret korrekt
- Error reporting konfigureret til at suppresse warnings og deprecations

## Installation

1. Klon eller download Hackorama til din lokale maskine
2. Rediger `setup.php` med din API-nøgle
3. Start den indbyggede PHP webserver:

```bash
./start-server.sh
# eller
php -S localhost:8080 router.php
```

4. Åbn http://localhost:8080 i din browser

## Konfiguration

Rediger `setup.php` for at konfigurere:

- **API nøgle**: Din Shoporama API nøgle
- **Host**: Vælg mellem `www.shoporama.dk` eller `localshoporama.dk`
- **Theme path**: Sti til dit tema (default: Alaska2)
- **Cache**: Cache indstillinger

## Struktur

```
hackorama/
├── src/
│   ├── API/          # API client til Shoporama REST API
│   ├── Core/         # Kerne funktionalitet (router, template, logger)
│   └── Wrappers/     # Safe wrapper klasser (SafeProduct, SafeCategory, etc.)
├── cache/            # Cache for API data og Smarty
├── themes/           # Temaer (Alaska2 inkluderet)
├── logs/             # Log filer
└── setup.php         # Konfiguration
```

## Test filer

- `/test-api.php` - Test API forbindelse
- `/test-output.php` - Test produkt wrapper output
- `/test-visual.php` - Visuel test med iframe
- `/debug.php` - Debug information

## Kendte begrænsninger

- Ikke alle Safe wrapper metoder er implementeret endnu (tilføjes efter behov)
- Checkout flow ikke implementeret
- Payment og shipping metoder ikke implementeret
- Blog funktionalitet ikke implementeret
- Customer login ikke implementeret

## Fejlfinding

Tjek `logs/hackorama.log` for fejl og debug information.

## Næste skridt

- Implementer checkout flow
- Tilføj customer login funktionalitet
- Implementer blog posts
- Tilføj payment og shipping metoder
- Implementer voucher/rabatkode funktionalitet

## Implementerede Wrapper Klasser

- **SafeProduct**: Fuld funktionalitet med 50+ metoder
- **SafeCategory**: Grundlæggende metoder implementeret
- **SafeImage**: Billede skalering implementeret
- **SafePage**: Side visning
- **SafeWebshop**: Webshop data og indstillinger
- **SafeProductProfile**: Produkt profiler
- **DefaultSafe**: Base klasse for alle wrappers