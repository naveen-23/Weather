<?php 
namespace App\Model;


class Weather
{
	/**
     * @return string
    */
	private $jsonData;

	const REQ_FIELDS = ['weather','temp','wind'];

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
			if(in_array($ky,SELF::REQ_FIELDS))
			{
				$reqData[$ky]=$list;
			}

			if(is_array($list))
			{
				foreach($list as $j=>$val)
				{
					if(in_array($j,SELF::REQ_FIELDS))
					{
						if(is_string($j))
						{
							$reqData[$j]=$val;	
						}
					}
				}
			}

		}

		return $reqData;
	}
}
