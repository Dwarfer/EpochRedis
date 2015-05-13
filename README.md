# About EpochRedis #
 
This set of tools has been writen for our own use with the EpochMod server we host at @www.deadmenrising.net.  So far this is farily limited and is a work in progress.

More information can be found on the EpochMod forum located bellow
http://epochmod.com/forum/index.php?/topic/32124-wipunofficial-php-epochredis-tools/

## Main features ##

- Cleanup AI Items when no trader exists anymore.
- Remove key items from traders
- Re stock basic items
- Add basic items to traders
- [WIP] Display Trader loaction and what they have in stock.

## ToDo List ##

- look for an economy trend and stock acrodigly.

## Contributing ##

## Using the Tools ##

These tools have been writen to run from a Linux (centos) server to work along side our website they can also be used via the command line and should work with windows although I have not tested that myself :-).

php ai_cleanup.php

## Credits ##

This is working using the predis from NRK @https://github.com/nrk/predis/wiki
