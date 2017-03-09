<?php
class CSecurity
{
	private $oConnManager;
    public function __construct()
    {
        $this->oConnManager = new CConManager();
    }
	
	public function CheckUser($Name,$Password)
    {
        $oResult =new CResult();
        if($this->oConnManager->Open())
		{
			$sql="SELECT * FROM sec_user WHERE UserName='$Name' AND Password='$Password' AND IsActive=1";
			$oResult=$this->oConnManager->query($sql);
		}
		return $oResult;        
    }
	
	public function CreateUser($oUserSetup)
    {
        $oResult =new CResult();
        if($this->oConnManager->Open())
		{
			$sql="INSERT INTO accesslog (ActionPage, ActionDone, Remarks, UserName, EntryDate) VALUES ('User Create','User Entry','User Name-$oUserSetup->UserName UserType- $oUserSetup->UserType','$oUserSetup->CreateBy','$oUserSetup->CreateDate')";
			$oResult=$this->oConnManager->query($sql);
			
			$sql="INSERT INTO sec_user ( UserName, Password, EmployeeID, UserType, IsActive, CreateBy, CreateDate) VALUES ('$oUserSetup->UserName','$oUserSetup->Password', '$oUserSetup->EmployeeID', '$oUserSetup->UserType','$oUserSetup->IsActive', '$oUserSetup->CreateBy','$oUserSetup->CreateDate')"; 
			$oResult=$this->oConnManager->query($sql);
		}
		return $oResult;        
    }
	
	public function UpdateUser($oUserSetup)
	{
		$Result=new CResult();
		if($this->oConnManager->Open())
		{
			$sql="INSERT INTO accesslog (ActionPage, ActionDone, Remarks, UserName, EntryDate) VALUES ('User Create','User Update','User Name-$oUserSetup->UserName UserType- $oUserSetup->Type ID=$oUserSetup->ID', '$oUserSetup->CreateBy','$oUserSetup->CreateDate')";
			$oResult=$this->oConnManager->query($sql);
			
			
			$sql="UPDATE sec_user SET UserName='$oUserSetup->UserName', ";
			if($oUserSetup->Password!='')
			 	$sql.="Password='$oUserSetup->Password', ";
			$sql.=" UserType='$oUserSetup->UserType', IsActive='$oUserSetup->IsActive', UpdateBy='$oUserSetup->CreateBy', UpdateDate='$oUserSetup->CreateDate' WHERE ID='$oUserSetup->ID'";
			$oResult=$this->oConnManager->query($sql);
		}
		return $oResult;
	}
	
	public function CreateRole($oRolesetup)
    {
        $oResult =new CResult();
        if($this->oConnManager->Open())
		{
			$sql="INSERT INTO accesslog (ActionPage, ActionDone, Remarks,IPAddress, UserName, EntryDate) VALUES ('Role Create','Role Entry','Name - $oRolesetup->Name','$oRolesetup->CreateBy','$oRolesetup->CreateDate')";
			$oResult=$this->oConnManager->query($sql);
			
			
			$sql="INSERT INTO sec_role (Name,IsActive, CreateBy, CreateDate) VALUES ('$oRolesetup->Name','$oRolesetup->IsActive','$oRolesetup->CreateBy','$oRolesetup->CreateDate')";
			$oResult=$this->oConnManager->query($sql);
			
		
		}
		return $oResult;        
    }
	
	
	public function UpdateRole($oRolesetup)
	{
		$Result=new CResult();
		if($this->oConnManager->Open())
		{
			
			$sql="INSERT INTO accesslog (ActionPage,ActionDone,Remarks,UserName,EntryDate) VALUES ('Role Create','Role Update','Name - $oRolesetup->Name','$oRolesetup->CreateBy','$oRolesetup->CreateDate')";
			$oResult=$this->oConnManager->query($sql);
			
			$sql="UPDATE sec_role SET Name='$oRolesetup->Name',IsActive='$oRolesetup->IsActive',UpdateBy='$oRolesetup->CreateBy',UpdateDate='$oRolesetup->CreateDate' WHERE ID='$oRolesetup->ID'";
			$oResult=$this->oConnManager->query($sql);
			
			
		}
		return $oResult;
	}
	
	public function ReadUserAccess($UserName,$PageLink)
	{
		$oResult=new CResult();
		$sql="Select sec_userrole.UserName,sec_userrole.RoleID,sec_rolepermission.IsAction,sec_rolepermission.IsInsert,sec_rolepermission.IsUpdate, sec_rolepermission.IsDelete, 
			  sec_menuitem.MenuName, sec_menuitem.PageLink, sec_menuitem.ModuleName, sec_menuitem.MotherMenu, sec_menuitem.PageName, sec_menuitem.IsReport
			  FROM sec_userrole INNER JOIN sec_rolepermission ON sec_rolepermission.RoleID = sec_userrole.RoleID 
			  INNER JOIN sec_menuitem ON  sec_menuitem.ID=sec_rolepermission.MenuID
			  WHERE sec_userrole.UserName='$UserName' AND sec_rolepermission.IsAction=1 AND sec_menuitem.PageLink='$PageLink'
			  ORDER BY sec_menuitem.ID, sec_menuitem.MenuName";
		$oResult=$this->oConnManager->query($sql);
		return $oResult;
	}
	
	public function CreateUpdateRoleMap(CUserToRoleMap $oCUserToRoleMap)
	{
		$Result=new CResult();
		if($this->oConnManager->Open())
		{
			$sql="INSERT INTO accesslog (ActionPage, ActionDone, Remarks, UserName, EntryDate) VALUES ('User Role','User Role Entry',' Name -$oCUserToRoleMap->UserName Role ID-$oCUserToRoleMap->RoleID', '$oCUserToRoleMap->CreateBy','$oCUserToRoleMap->CreateDate')";
			$oResult=$this->oConnManager->query($sql);	
				
			if($oCUserToRoleMap->BtnStatus=="Save")
			{
			  $sql="INSERT INTO sec_userrole (UserName,RoleID,CreateBy,CreateDate) VALUES ('$oCUserToRoleMap->UserName','$oCUserToRoleMap->RoleID','$oCUserToRoleMap->CreateBy','$oCUserToRoleMap->CreateDate')";
			  $oResult=$this->oConnManager->query($sql);
			}
			
			if($oCUserToRoleMap->BtnStatus=="Update")
			{
			  $sql="UPDATE sec_userrole SET UserName='$oCUserToRoleMap->UserName',RoleID='$oCUserToRoleMap->RoleID' WHERE ID=$oCUserToRoleMap->ID";
			  $oResult=$this->oConnManager->query($sql);
			}
		}
		return $oResult;
	}
};		
?>