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
- Komplet checkout flow implementeret (basket → address → shipping → payment)
- Produkt billeder i kurv virker korrekt
- Address side design og warnings fixed
- Blog funktionalitet implementeret
- User-edit side implementeret
- Search page warnings fixed
- Automatisk billede caching fra mortensbutik.dk implementeret
- ProductCache system for at cache alle produkter fra API
- Landing pages viser nu rigtige produkter fra API i stedet for mock data
- Billede dimensioner og formater matcher nu mortensbutik.dk (300x400px box mode for landing pages, 500x500px fit mode for produktsider)

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
├── cache/            # Cache for API data, Smarty og billeder
├── themes/           # Temaer (Alaska2 inkluderet)
├── logs/             # Log filer
├── images.php        # Billede proxy for automatisk caching
└── setup.php         # Konfiguration
```

## Debug

- `/debug.php` - Debug information og system status

## Billede System

Hackorama implementerer et avanceret billede caching system:

- **Automatisk download**: Billeder downloades automatisk fra mortensbutik.dk når de ikke findes i cache
- **Korrekte dimensioner**: Matcher mortensbutik.dk præcist (300x400px box mode for landing pages, 500x500px fit mode for produktsider)
- **Proxy system**: `/images.php` håndterer automatisk download og caching
- **Cache TTL**: Billeder caches permanent indtil manuelt slettet

## Product Cache System

- **ProductCache**: Cacher alle produkter fra API i JSON format
- **Cache TTL**: 1 time før refresh fra API
- **Batch fetching**: Henter produkter i batches af 100 for performance
- **Real data**: Landing pages viser nu rigtige produkter fra API i stedet for mock data

## Kendte begrænsninger

- Ordre visning delvist implementeret

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

- Komplet ordre management implementering
- Forbedre payment integration
- Optimering af produktcache performance

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
- **SafeLandingPage**: Landing page wrapper med rigtige produkter fra API
- **SafeBlogPost**: Blog post wrapper med metadata og indhold
- **DefaultSafe**: Base klasse for alle wrappers
- **BasketManager**: Cookie-baseret kurv med JSON storage og voucher support
- **ProductCache**: Avanceret cache system for alle produkter fra API
- **ImageCache**: Automatisk billede download og caching system