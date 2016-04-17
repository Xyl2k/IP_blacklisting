# IP blacklisting

![2016-04-17_18-19-31](https://cloud.githubusercontent.com/assets/8536299/14588494/416ea6a6-04cb-11e6-81db-fccdc4c100d4.png)

IP blacklist using php and 2 sql tables. ([see here for an htaccess version.](https://github.com/Xyl2k/XyliLabs-Ruins))<br>
All you have to do when you detect a bad query is to call ```reloadIpList();```<br>
After 3 calls from the same IP, the function will simply blacklist it.
