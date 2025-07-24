Hackorama er et udviklingsframework til Shoporama

Idéen er kort fortalt følgende:

1. Man henter Hackorama ned
2. Tilpasser setup.php med din API-nøgle fra Shoporama
3. Angiver et bibliotek hvor ens tema ligger
4. Angiver en synlig URL hvor Hackorama kan tilgår, og man kan se shoppen
5. Man udvikler temaet og tester

Bagved ovenstående tænker jeg at Hackorama via API'et henter alle ens data ned i nogle lokale JSON filer.

Hackorama skal indeholde wrapper klasser og metoder der efterligner dem fra Shoporama, så når temaet bruger <{$category->getName()|escape}>
skal den metode returnere navnet.

Hackorama skal loade og bruge Smarty fra biblioteket her, og så assigne de rigtige værdier.

Shoporama ligger lokalt i /Users/mbn/www/shoporama og lamplite (framework) ligger i /Users/mbn/www/lamplite. Kig de filer igennem for at
undersøge strukturen. Det er særlige webshop.php samt metoderne i admin/class/safe/*.php der skal bruges.

Min nøgle er pt ce10d0cfd16cd1cf98c4f47cdcad7b15 og der skal kunne indstilles om man vil bruge www.shoporama.dk eller
localshoporama.dk i ens setup.php.

Du kan se dokumentationen til rest-interfacet her: https://localshoporama.dk/index/swagger eller ved at læse controller/rest.php igennem
