<?php

use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER trgReport_afIns_tbTransactions AFTER INSERT ON transactions FOR EACH ROW 
        BEGIN 
          IF NEW.status = \'success\' THEN 
            IF (SELECT COUNT(*) FROM reports WHERE idCafe=NEW.idCafe AND date=DATE(NEW.transaction_at)) > 0 THEN 
              UPDATE reports SET total=total+NEW.total, trans=trans+1 WHERE idCafe=NEW.idCafe AND date=DATE(NEW.transaction_at); 
            ELSE 
              INSERT INTO reports(idCafe,date,trans,total) VALUES(NEW.idCafe, DATE(NEW.transaction_at), 1, NEW.total); 
            END IF;
          END IF;
        END
        ');

        DB::unprepared('
        CREATE TRIGGER trgReport_afUp_tbTransactions AFTER UPDATE ON transactions FOR EACH ROW 
        BEGIN 
          IF NEW.status = \'success\' THEN 
            IF (SELECT COUNT(*) FROM reports WHERE idCafe=NEW.idCafe AND date=DATE(NEW.transaction_at)) > 0 THEN 
              UPDATE reports SET total=total+NEW.total, trans=trans+1 WHERE idCafe=NEW.idCafe AND date=DATE(NEW.transaction_at); 
            ELSE 
              INSERT INTO reports(idCafe,date,trans,total) VALUES(NEW.idCafe, DATE(NEW.transaction_at), 1, NEW.total); 
            END IF;
          END IF;
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER trgReport_afIns_tbTransactions');
        DB::unprepared('DROP TRIGGER trgReport_afUp_tbTransactions');
    }
}
