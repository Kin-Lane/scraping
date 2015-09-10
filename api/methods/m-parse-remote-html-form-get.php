<?php

$route = '/parse-remote-html-form/';
$app->get($route, function ()  use ($app){

	$ReturnObject = array();

	$request = $app->request();
 	$params = $request->params();

	if(isset($params['target']))
		{
		$target = $params['target'];
		$referrer = $params['referrer'];

		$web_page = http_get($target, $referrer);

		$web_body = $web_page['FILE'];

		$Begin_Tag = "<body>";
		$End_Tag = "</body>";
		$web_body = return_between($web_body, $Begin_Tag, $End_Tag, INCL);

		$beg_tag = "<form";
		$close_tag = "</form>";

		$FormArray = parse_array($web_body, $beg_tag, $close_tag);
		$FormCount = 0;

		foreach ($FormArray as $form)
			{
			$formaction = get_attribute($form,'action');
			//echo "form action: " . $formaction . "<br />";
			$formmethod = get_attribute($form,'method');
			//echo "form method: " . $formmethod . "<br />";
			$formname = get_attribute($form,'name');
			//echo "form name: " . $formname . "<br />";

			$FormResults = array();
			$FormResults['action'] = $formaction;
			$FormResults['method'] = $formmethod;
			$FormResults['name'] = $formname;
			$FormResults['inputs'] = array();
			$FormResults['selects'] = array();

			$beg_tag = "<select";
			$close_tag = "</select>";

			$SelectArray = parse_array($form, $beg_tag, $close_tag);
			$HowManySelect = count($SelectArray);
			//echo "How Many Selects? " . $HowManySelect . "<br />";
			foreach ($SelectArray as $Select)
				{
				$selectname = get_attribute($Select,'name');
				//echo "select name: " . $selectname . "<br />";

				$SelectResults = array();
				$SelectResults['name'] = $selectname;
				$SelectResults['options'] = array();

				$beg_tag = "<option";
				$close_tag = "</option>";

				$OptionArray = parse_array($Select, $beg_tag, $close_tag);

				foreach ($OptionArray as $Option)
					{
					$optionvalue = get_attribute($Option,'value');
					//echo "option value: " . $optionvalue . "<br />";
					$optionlabel = strip_tags($Option);
					//echo "option label: " . $optionlabel . "<br />";

					if($optionvalue==''){ $optionvalue = $optionlabel; }

					$OptionResults = array();
					$OptionResults['value'] = $optionvalue;
					$OptionResults['label'] = $optionlabel;

					array_push($SelectResults['options'], $OptionResults);

					}
				array_push($FormResults['selects'], $SelectResults);
				}

			$beg_tag = "<input";
			$close_tag = ">";

			$InputArray = parse_array($form, $beg_tag, $close_tag);
			$HowManyInput = count($InputArray);
			//echo "How Many Inputs? " . $HowManyInput . "<br />";
			foreach ($InputArray as $Input)
				{

				$inputid = get_attribute($Input,'id');
				//echo "input id: " . $inputid . "<br />";
				$pos = strpos($inputid, '=');
				if ($pos !== false)
					{
					$inputid = "no id";
					}

				$inputname = get_attribute($Input,'name');
				//echo "input name: " . $inputname . "<br />";
				$pos = strpos($inputname, '=');
				if ($pos !== false)
					{
					$inputname = "no name";
					}

				$inputtype = get_attribute($Input,'type');
				//echo "input type: " . $inputtype . "<br />";

				$inputvalue = get_attribute($Input,'value');
				//echo "input value: " . $inputvalue . "<br />";
				$pos = strpos($inputvalue, '=');
				if ($pos !== false)
					{
					}
				else
					{
					$InputResults = array();
					$InputResults['id'] = $inputid;
					$InputResults['name'] = $inputname;
					$InputResults['type'] = $inputtype;
					$InputResults['value'] = $inputvalue;
					}
				array_push($FormResults['inputs'], $InputResults);
				}

			$HowManyFields = $HowManyInput + $HowManySelect;
			//echo "How Many Fields? " . $HowManyFields . "<br />";

			array_push($ReturnObject, $FormResults);

			}
		}
		else
			{
			$app->status(500);
			$ReturnObject['error'] = "No target provided!";
			}
		$app->response()->header("Content-Type", "application/json");
		echo stripslashes(format_json(json_encode($ReturnObject)));
	});

?>
