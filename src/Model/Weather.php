<?php 
namespace App\Model;


class Weather
{
	/**
     * @return string
    */
	private $jsonData;

	const REQ_FIELDS = ['weather'=>'weather_type','temp'=>'temparature','wind'=>'wind'];

	public function getJsonData()
	{
		return $this->jsonData;
	}

	public function setJsonData($jsonData)
	{
		$this->jsonData = $jsonData;
	}
	public function getRequriedData()
	{
		$reqData = [] ;
		foreach($this->jsonData as $ky =>$list)
		{
			if(in_array($ky,array_keys(SELF::REQ_FIELDS)))
			{
				$reqData[self::REQ_FIELDS[$ky]]=$list;
			}

			if(is_array($list))
			{
				foreach($list as $j=>$val)
				{
					if(in_array($j,array_keys(SELF::REQ_FIELDS)))
					{
						if(is_string($j))
						{
							$reqData[self::REQ_FIELDS[$j]]=$val;	
						}
					}
				}
			}

		}

		return $reqData;
	}
}
