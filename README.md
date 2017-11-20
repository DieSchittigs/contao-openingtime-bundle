# contao-openingtime-bundle

A bundle for contao 4 to add opening times with some features to a website

## Installation

Install via Composer

'Composer require dieschittigs/contao-openingtime-bundle'

## Usage

Output via insert tags:

Show opening Times of a specific day
'{{opened::Mo|DI|Mi|Do|Fr|Sa|So}}'

Show the next special day
'{{opened::special}}'

Show the current opening information (Opened now until ..., Opened tomorrow on ...)
'{{opened::now}}'
