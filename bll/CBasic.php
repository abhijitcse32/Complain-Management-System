<?php
class CBasic
{
	private $oConnManager;
    public function __construct()
    {
        $this->oConnManager = new CConManager();
    }
	
	public function SqlQuery($Sql)
    {
        $oResult =new CResult();
        if($this->oConnManager->Open())
		{
			$oResult=$this->oConnManager->query($Sql);
		}
		return $oResult;        
    }
};		
?>