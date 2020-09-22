CREATE FUNCTION calcTax()  
returns decimal(7,2)  
AS
BEGIN
DECLARE amtTax DECIMAL(9,2);
DECLARE amt DECIMAL(9,2) DEFAULT 0;
DECLARE done int default 0;
declare a int default 3;
declare cnt int default 0;
DECLARE temp cursor for select tax from Slabs WHERE currSalary BETWEEN minsal AND maxsal;
DECLARE continue handler for not found set done=1;
open temp;
repeat 
fetch temp into amtTax;
if done=0 and cnt<a then 
	SET amt = currSalary * amtTax / 100;
end if;
	set cnt=cnt+1;
until done end repeat; 

close temp;
RETURN amt;
END