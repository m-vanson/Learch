# Learch
 
All you need is:
- A webserver with PHP (tested with version 7.2)
- An elasticsearch server
- Windows server eventlogs being shipped to Elastic (use winlogbeat)
- An alias so Learch searches through all indexes:

Use the following in the Kibana dev tools:
 POST /_aliases
 {
     "actions" : [
         { "add" : { "index" : "winlogbeat*", "alias" : "winlogbeat" } }
     ]
 }
 
 Now open "application\config\learch.php" and change:
 $config['elasticHosts'] = [
        'http://192.168.178.4:9200'
    ];
 To you elastic host.
