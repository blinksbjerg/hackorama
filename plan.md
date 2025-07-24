# Hackorama Udviklingsplan

## Projekt Oversigt
Hackorama er et udviklingsframework til Shoporama, der gør det muligt at udvikle og teste Shoporama temaer lokalt.

## Status (FÆRDIG!)
- ✅ Grundlæggende struktur oprettet
- ✅ API integration implementeret og testet
- ✅ Wrapper klasser (SafeCategory, SafeProduct, etc.) implementeret
- ✅ Smarty 4 integration fungerer med Shoporama's custom delimiters (<{ }>)
- ✅ Alaska2 tema kopieret og konfigureret
- ✅ Webserver kører på localhost:8080
- ✅ Fejlfinding færdig - alle kritiske fejl rettet
- ✅ Logger system tilføjet
- ✅ Global.html wrapper pattern implementeret korrekt
- ✅ Alle hovedsider fungerer: forside, produkter, kategorier, kurv, søgning
- ✅ Billede skalering implementeret
- ✅ Kurv funktionalitet implementeret (tilføj til kurv)
- ✅ Error reporting konfigureret til at suppresse warnings
- ✅ Test filer og dokumentation oprettet

## Fase 1: Undersøgelse og Forberedelse
1. **Undersøg Shoporama strukturen**
   - Analysér `/Users/mbn/www/shoporama/webshop.php`
   - Gennemgå klasser i `/Users/mbn/www/shoporama/admin/class/safe/*.php`
   - Identificér centrale metoder og API struktur

2. **Undersøg Lamplite framework**
   - Analysér framework strukturen i `/Users/mbn/www/lamplite`
   - Forstå hvordan det integrerer med Shoporama

3. **Undersøg REST API dokumentation**
   - Gennemgå Swagger dokumentation på https://localshoporama.dk/index/swagger
   - Analysér `/Users/mbn/www/shoporama/controller/rest.php`
   - Forstå API endpoints og data strukturer

## Fase 2: Grundlæggende Implementering
4. **Opret projekt struktur**
   ```
   hackorama/
   ├── setup.php              # Konfigurationsfil
   ├── index.php             # Hovedindgang
   ├── src/
   │   ├── API/              # API integration
   │   ├── Wrappers/         # Shoporama wrapper klasser
   │   └── Core/             # Kerne funktionalitet
   ├── cache/                # JSON data cache
   └── themes/               # Tema bibliotek
   ```

5. **Implementer setup.php**
   - API-nøgle konfiguration (default: ce10d0cfd16cd1cf98c4f47cdcad7b15)
   - Server valg mellem www.shoporama.dk og localshoporama.dk
   - Tema bibliotek sti
   - Lokal URL konfiguration

## Fase 3: API Integration
6. **API Client**
   - Opret klasse til at kommunikere med Shoporama REST API
   - Implementer autentificering med API-nøgle
   - Understøt både www.shoporama.dk og localshoporama.dk endpoints

7. **Data Synkronisering**
   - Hent produkter, kategorier, sider etc. fra API
   - Gem data som JSON filer i cache biblioteket
   - Implementer cache strategi for at minimere API kald

## Fase 4: Wrapper Implementation
8. **Wrapper Klasser**
   - Category klasse med getName() og andre metoder
   - Product klasse med relevante metoder
   - Customer, Order, osv. efter behov
   - Sikre fuld kompatibilitet med Shoporama's objekt interface

## Fase 5: Template Integration
9. **Smarty Integration**
   - Indlæs og konfigurer Smarty
   - Sæt template paths
   - Konfigurer Smarty til at matche Shoporama's setup

10. **Data Assignment**
    - Load JSON data og konverter til wrapper objekter
    - Assign data til Smarty variabler
    - Håndter template rendering
    - Implementer Shoporama's specifikke template funktioner

## Fase 6: Test og Finpudsning
11. **Test Setup**
    - Opret eksempel tema
    - Test alle wrapper metoder
    - Verificer at templates renderes korrekt
    - Test med rigtige data fra API

## Tekniske Overvejelser
- **Caching**: JSON filer opdateres kun ved behov
- **Performance**: Lazy loading af data hvor muligt
- **Kompatibilitet**: Sikre fuld kompatibilitet med Shoporama's template syntax
- **Fejlhåndtering**: Robust fejlhåndtering for manglende data eller API fejl
- **API Endpoints**: Mulighed for at skifte mellem www.shoporama.dk og localshoporama.dk
- **Sikkerhed**: API-nøgle skal beskyttes og ikke committes til version control

## API Information
- **Test API-nøgle**: ce10d0cfd16cd1cf98c4f47cdcad7b15
- **Swagger dokumentation**: https://localshoporama.dk/index/swagger
- **REST controller**: controller/rest.php

## Næste Skridt
Start med at undersøge Shoporama og Lamplite strukturen for at forstå eksisterende implementering, efterfulgt af analyse af REST API dokumentationen.