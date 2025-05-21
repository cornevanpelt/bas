# BAS - Salary Payment Date tool
Dit is een Proof-of-Concept applicatie voor het genereren van salarisbetaaldata, de applicatie voldoet aan de 
volgende vereisten: https://github.com/bas-world/developer-challenge-pay-dates

De intentie is om een stukje back-end code te demonsteren op basis van een simpele architectuur.
De applicatie is niet productiewaardig maar de code is wel zo opgezet dat deze gemakkelijk zou kunnen worden
aangepast en uitgebreid om daarna te worden geintegreerd als onderdeel van een nog te bouwen salarisapplicatie.
 
Een framework is (nu nog) niet nodig, maar om de code makkelijk (her)bruikbaar te maken zoals hierboven omschreven
is er wel voor gekozen om het object-georienteerd op te zetten en gebruik te maken van een IoC/DI container. Dit
is zeker niet noodzakelijk voor zo'n triviale applicatie, maar ik vind dit wel een minimum vereiste om een goede
basis neer te zetten waarop later verder gebouwd kan worden of waarvan de code gemakkelijk hergebruikt kan worden.

**Omgevingsvereisten**
- Docker (bevat PHP, Git en Composer)

**Stappen om de applicatie te runnen**
1) Clone repo to a project folder (e.g. "bas-salary")\
`git clone https://github.com/cornevanpelt/bas.git bas-salary`
2) Go into the root directory of the project\
`cd bas-salary` 
3) Create docker image (e.g. bas-payment-app)\
`docker build -t bas-payment-app .`
4) Run docker container and bash into container\
`docker run -it -v "$(pwd):/bas" bas-payment-app bash`
5) Run "composer install" to install dependencies\
`composer install`
6) Run command line application\
`php main.php`

**Aannames bij het maken van deze PoC applicatie**
- Front-end is niet belangrijk in deze PoC, het gaat om het OO-design van de backend.
- Exception handling, caching en validatie hebben geen prioriteit in deze PoC en zijn dus niet productiewaardig geimplementeerd.
- Er is geen authenticatie/authorisatie mechanisme geimplementeerd omdat dat buiten de scope van de PoC valt.
- Unit tests en/of integration tests vallen buiten de scope van de PoC.