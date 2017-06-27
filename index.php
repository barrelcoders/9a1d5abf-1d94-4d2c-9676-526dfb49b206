<html>
	<head>
		<script type="text/javascript" src="jquery.min.js"></script>
		<script type="text/javascript" src="moment.min.js"></script>
	</head>
	<body>
		<form>
		  <table>
			<thead>
				<tr>
				  <th>Due Date</th>
				  <th>Payment Date</th>
				  <th>Amount</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				  <th><input type="date" id="due_dt_1"></th>
				  <th><input type="date" id="pay_dt_1"></th>
				  <th><input type="text" id="pay_txt_1"></th>
				  <th><select id="case_sl_1"><option value="A">S.T. Collected but not Deposit</option><option value="B">Other</option></select></th>
				</tr>
				<tr>
				  <th><input type="date" id="due_dt_2"></th>
				  <th><input type="date" id="pay_dt_2"></th>
				  <th><input type="text" id="pay_txt_2"></th>
				  <th><select id="case_sl_2"><option value="A">S.T. Collected but not Deposit</option><option value="B">Other</option></select></th>
				</tr>
				<tr>
				  <th><input type="date" id="due_dt_3"></th>
				  <th><input type="date" id="pay_dt_3"></th>
				  <th><input type="text" id="pay_txt_3"></th>
				  <th><select id="case_sl_3"><option value="A">S.T. Collected but not Deposit</option><option value="B">Other</option></select></th>
				</tr>
				<tr>
				  <th><input type="date" id="due_dt_4"></th>
				  <th><input type="date" id="pay_dt_4"></th>
				  <th><input type="text" id="pay_txt_4"></th>
				  <th><select id="case_sl_4"><option value="A">S.T. Collected but not Deposit</option><option value="B">Other</option></select></th>
				</tr>
				<tr>
				  <th><input type="date" id="due_dt_5"></th>
				  <th><input type="date" id="pay_dt_5"></th>
				  <th><input type="text" id="pay_txt_5"></th>
				  <th><select id="case_sl_5"><option value="A">S.T. Collected but not Deposit</option><option value="B">Other</option></select></th>
				</tr>
				<tr>
				  <th><input type="date" id="due_dt_6"></th>
				  <th><input type="date" id="pay_dt_6"></th>
				  <th><input type="text" id="pay_txt_6"></th>
				  <th><select id="case_sl_6"><option value="A">S.T. Collected but not Deposit</option><option value="B">Other</option></select></th>
				</tr>
				<tr>
				  <th><input type="date" id="due_dt_7"></th>
				  <th><input type="date" id="pay_dt_7"></th>
				  <th><input type="text" id="pay_txt_7"></th>
				  <th><select id="case_sl_7"><option value="A">S.T. Collected but not Deposit</option><option value="B">Other</option></select></th>
				</tr>
				<tr>
				  <th><input type="date" id="due_dt_8"></th>
				  <th><input type="date" id="pay_dt_8"></th>
				  <th><input type="text" id="pay_txt_8"></th>
				  <th><select id="case_sl_8"><option value="A">S.T. Collected but not Deposit</option><option value="B">Other</option></select></th>
				</tr>
				<tr>
				  <th><input type="date" id="due_dt_9"></th>
				  <th><input type="date" id="pay_dt_9"></th>
				  <th><input type="text" id="pay_txt_9"></th>
				  <th><select id="case_sl_9"><option value="A">S.T. Collected but not Deposit</option><option value="B">Other</option></select></th>
				</tr>
				<tr>
				  <th><input type="date" id="due_dt_10"></th>
				  <th><input type="date" id="pay_dt_10"></th>
				  <th><input type="text" id="pay_txt_10"></th>
				  <th><select id="case_sl_10"><option value="A">S.T. Collected but not Deposit</option><option value="B">Other</option></select></th>
				</tr>
				<tr>
				  <th><input type="date" id="due_dt_11"></th>
				  <th><input type="date" id="pay_dt_11"></th>
				  <th><input type="text" id="pay_txt_11"></th>
				  <th><select id="case_sl_11"><option value="A">S.T. Collected but not Deposit</option><option value="B">Other</option></select></th>
				</tr>
				<tr>
				  <th><input type="date" id="due_dt_12"></th>
				  <th><input type="date" id="pay_dt_12"></th>
				  <th><input type="text" id="pay_txt_12"></th>
				  <th><select id="case_sl_12"><option value="A">S.T. Collected but not Deposit</option><option value="B">Other</option></select></th>
				</tr>
			  </tbody>
		  </table>
		  <div>
			<input type="button" id="btn_cal" value="Calculate"/>
			<input type="reset" value="Cancel"/>
		  </div>
	  </form>
	  <script type="text/javascript">
		var collection = [],
			CONDITION_1_DATE = moment("2014-09-30")
			CONDITION_1_RATE = 0.18,
			CONDITION_2_DATE = moment("2016-05-14")
			CONDITION_2_RATE_1 = 0.18,
			CONDITION_2_RATE_2 = 0.24,
			CONDITION_2_RATE_3 = 0.30;
			CONDITION_3_RATE_1 = 0.24,
			CONDITION_3_RATE_2 = 0.15,
			
		
		$('#btn_cal').click(function(){		
			collection = [];
			for(var i=1; i<=12; i++){
				var data = {
					"DUE_DATE": moment($('#due_dt_'+i).val()),
					"PAY_DATE": moment($('#pay_dt_'+i).val()),
					"AMOUNT": $('#pay_txt_'+i).val(),
					"CONDITION_3_CASE": $('#case_sl_'+i).val()
				};
				collection.push(data);
			}
			for(var i=0; i<=collection.length-1; i++){
				var TOTAL_DAYS_DIFF =  collection[i].PAY_DATE.diff(collection[i].DUE_DATE, 'days'),
					DAYS_UPTO_CONDITION_1 = CONDITION_1_DATE.diff(collection[i].DUE_DATE, 'days'),
					DAYS_UPTO_CONDITION_2 = CONDITION_2_DATE.diff(collection[i].DUE_DATE, 'days'),
					DAYS_FOR_CONDITION_1 = DAYS_UPTO_CONDITION_1,
					DAYS_FOR_CONDITION_2 = (collection[i].PAY_DATE > CONDITION_2_DATE) ? ( DAYS_UPTO_CONDITION_2 - DAYS_UPTO_CONDITION_1 ) : (TOTAL_DAYS_DIFF - DAYS_UPTO_CONDITION_1),
					DAYS_FOR_CONDITION_3 = (collection[i].PAY_DATE > CONDITION_2_DATE) ? (TOTAL_DAYS_DIFF - DAYS_UPTO_CONDITION_2) : 0;
				
				collection[i].TOTAL_DAYS = TOTAL_DAYS_DIFF;
				collection[i].CONDITION_1_DAYS = DAYS_FOR_CONDITION_1;
				collection[i].CONDITION_1_INTEREST = (DAYS_FOR_CONDITION_1 * CONDITION_1_RATE * collection[i].AMOUNT)/365;
				
				if(DAYS_FOR_CONDITION_2 > 0 && DAYS_FOR_CONDITION_2 <= 180){
					collection[i].CONDITION_2_RATE_1_DAYS = DAYS_FOR_CONDITION_2;
					collection[i].CONDITION_2_RATE_1_INTEREST = (DAYS_FOR_CONDITION_2 * CONDITION_2_RATE_1 * collection[i].AMOUNT)/365;
					collection[i].CONDITION_2_RATE_2_DAYS = 0;
					collection[i].CONDITION_2_RATE_2_INTEREST = 0;
					collection[i].CONDITION_2_RATE_3_DAYS = 0;
					collection[i].CONDITION_2_RATE_3_INTEREST = 0;
				}
				
				if(DAYS_FOR_CONDITION_2 > 180 && DAYS_FOR_CONDITION_2 <= 365){
					collection[i].CONDITION_2_RATE_1_DAYS = 180;
					collection[i].CONDITION_2_RATE_1_INTEREST = (180 * CONDITION_2_RATE_1 * collection[i].AMOUNT)/365;
					collection[i].CONDITION_2_RATE_2_DAYS = DAYS_FOR_CONDITION_2 - 180;
					collection[i].CONDITION_2_RATE_2_INTEREST = ((DAYS_FOR_CONDITION_2 - 180) * CONDITION_2_RATE_2 * collection[i].AMOUNT)/365;
					collection[i].CONDITION_2_RATE_3_DAYS = 0;
					collection[i].CONDITION_2_RATE_3_INTEREST = 0;
				}
				
				if(DAYS_FOR_CONDITION_2 > 365 ){
					collection[i].CONDITION_2_RATE_1_DAYS = 180;
					collection[i].CONDITION_2_RATE_1_INTEREST = (180 * CONDITION_2_RATE_1 * collection[i].AMOUNT)/365;
					collection[i].CONDITION_2_RATE_2_DAYS = 185;
					collection[i].CONDITION_2_RATE_2_INTEREST = (185 * CONDITION_2_RATE_2 * collection[i].AMOUNT)/365;
					collection[i].CONDITION_2_RATE_3_DAYS = DAYS_FOR_CONDITION_2 - 365;
					collection[i].CONDITION_2_RATE_3_INTEREST = ((DAYS_FOR_CONDITION_2 - 365) * CONDITION_2_RATE_3 * collection[i].AMOUNT)/365;
				}
				
				if(collection[i].CONDITION_3_CASE == "A"){
					collection[i].CONDITION_3_DAYS = DAYS_FOR_CONDITION_3;
					collection[i].CONDITION_3_INTEREST = (DAYS_FOR_CONDITION_3 * CONDITION_3_RATE_1 * collection[i].AMOUNT)/365;
				}
				else if(collection[i].CONDITION_3_CASE == "B"){
					collection[i].CONDITION_3_DAYS = DAYS_FOR_CONDITION_3;
					collection[i].CONDITION_3_INTEREST = (DAYS_FOR_CONDITION_3 * CONDITION_3_RATE_2 * collection[i].AMOUNT)/365;
				}
				
				collection[i].TOTAL_INTEREST = collection[i].CONDITION_1_INTEREST + 
											   collection[i].CONDITION_2_RATE_1_INTEREST + 
											   collection[i].CONDITION_2_RATE_2_INTEREST + 
											   collection[i].CONDITION_2_RATE_3_INTEREST + 
											   collection[i].CONDITION_3_INTEREST;
				
			}
			console.log(collection);
		});
	  </script>
	</body>
</html>