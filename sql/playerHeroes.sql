SELECT finalhero.name, finalherorace.racename, finalheroclass.classname, finalhero.gender, finalplayer.playerid
FROM finalhero 
JOIN finalherorace ON finalhero.race=finalherorace.raceid
JOIN finalheroclass ON finalhero.class=finalheroclass.classid
JOIN finalplayerhero ON finalhero.heroid=finalplayerhero.heroid
JOIN finalplayer ON finalplayerhero.playerid=finalplayer.playerid
WHERE finalhero.name LIKE :term;