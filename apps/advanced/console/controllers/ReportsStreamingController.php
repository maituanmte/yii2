<?php

namespace console\controllers;

use common\models\TmpTransactionMediaDkView;
use common\models\TmpTransactionMediaStorage;

class ReportsStreamingController extends \yii\console\Controller 
{

    public function actionIndex() {
        //Yii::app()->gearman->worker()->addFunction("report_streaming", array($this, 'reportProcess'));
		//while($worker->work()) { echo "Done!"; }
    	$this->reportProcess(null);
    }
	
	private function reportProcess($job){
		
		$groupActionMsisdn = array();
		
		$dkViews = TmpTransactionMediaDkView::find()->all();
		//Loc nhom hanh dong theo tung msisdn
        foreach($dkViews as $item){
        	
			$groupActionMsisdn[$item->ISDN][] = $item;
		}
		foreach($groupActionMsisdn as $msisdn=>$item){		
			$msisdnData = $groupActionMsisdn[$msisdn];
			
			$pos = 0;
			//Xu ly tren tung hanh dong cua msisdn
			foreach($msisdnData as $key=>$value){
				if($value->action == 'STREAMING' && date($value->STA_DATETIME) > date('2014-05-01')){	
					
					for($i = $pos; $i--; $i>=0){
						
						$actionItem = $msisdnData[$i];			
						if($actionItem->action == 'MONFEE'){
							//CAP NHAT info5
							//INSERT TO TO BANG TONG HOP
							$storage = new TmpTransactionMediaStorage();
							$storage->attributes = $value->attributes;				
							$info5 = $storage->INFO_5;						
							$alterInfo5 = substr($info5, 0, strripos($info5, '|') + 1).$value->package_price;
							$storage->INFO_5 = $alterInfo5;
							$storage->save(false);
							break;
						}
						
						if($actionItem->action == 'REGISTER'){
							//INSERT TO TO BANG TONG HOP ko can cap nhat
							$storage = new TmpTransactionMediaStorage();
							$storage->attributes = $value->attributes;					
							$storage->save(false);
							break;
						}
					}
				}
				$pos++;
			}
		}
	}
}
