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
- Menu system implementeret fra Shoporama API
- Landing page support implementeret
- Voucher template fejl løst

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

## Debug

- `/debug.php` - Debug information og system status

## Kendte begrænsninger

- Checkout flow delvist implementeret (address og shipping sider)
- Payment metoder ikke implementeret  
- Blog funktionalitet ikke implementeret
- Ordre visning ikke implementeret

## Kunde Login

Da Shoporama REST API ikke returnerer passwords, er Hackorama konfigureret til at acceptere passwordet **"password"** for alle kunder. Dette gør det muligt at teste kunde login funktionalitet.

**Login eksempel:**
- Email: kunde@example.com
- Password: password

## Rabatkoder

Hackorama henter rabatkoder fra Shoporama API. Aktuelle rabatkoder:
- **10pct** - 10% rabat

## Fejlfinding

Tjek `logs/hackorama.log` for fejl og debug information.

## Næste skridt

- Implementer checkout flow
- Tilføj customer login funktionalitet
- Implementer blog posts
- Tilføj payment og shipping metoder
- Implementer voucher/rabatkode funktionalitet

## Implementerede Wrapper Klasser

- **SafeProduct**: Fuld funktionalitet med 150+ metoder implementeret
- **SafeCategory**: Grundlæggende metoder implementeret
- **SafeImage**: Billede skalering implementeret
- **SafePage**: Side visning
- **SafeWebshop**: Webshop data og indstillinger inkl. menu support
- **SafeProductProfile**: Produkt profiler
- **SafePdfFile**: PDF fil håndtering
- **SafeCustomer**: Kunde data og metoder
- **SafeShipping**: Forsendelsesmetoder
- **SafeVoucher**: Rabatkode håndtering
- **SafeMenu**: Menu data fra API
- **SafeMenuItem**: Menu items med URL generation
- **SafeLandingPage**: Landing page wrapper med produkter
- **DefaultSafe**: Base klasse for alle wrappers
- **BasketManager**: Cookie-baseret kurv med JSON storage og voucher support