<?php

class InputTypes {
 const Text = 'text';
 const Email = 'email';
 const Password = 'password';
 const Number = 'number'; 
 const Date = 'date';
 const CheckBox = 'checkbox';
 const Year = 'year';
 const TextArea = 'textArea';
 const ComboBox = 'comboBox'; 
}

class InputObjects {
  var $ColumnName, $Text, $InputType;
  var $ComboHelp;
  
  function __construct($ColumnName, $Text, $InputType) {
    $this->ColumnName = $ColumnName;
    $this->Text = $Text;
    $this->InputType = $InputType;
  }
  
  function draw() {
    if($this->InputType === 'comboBox') {
		  $this->drawCombo();
      return;
    }
    
    // TODO
  }
}

class SearchObject {
  var $ColumnName, $Text, $IsExl;
  
  function __construct($ColumnName, $Text, $IsExl) {
   $this->ColumnName = $ColumnName;
   $this->Text = $Text;
   $this->IsExl = $IsExl;
  }
  
  function draw($Row) {
   return $Row[$this->ColumnName]; 
  }
}

class LinkObject extends SearchObject {
 var $PageName, $ReferansColumn;
 var $RoleCheck, $Page;
 
 function __construct($Text, $PageName, $conn, $UserTitle, $ReferansColumn) {
  parent::__construct(null, $Text, false);
  $this->PageName = $PageName;
  $this->ReferansColumn = $ReferansColumn;
  
  $this->RoleCheck = CheckPageRoles($conn, $UserTitle, $PageName);
  $this->Page = $conn->query("SELECT PageURL, PageDescription FROM Pages WHERE PageName = '" . $PageName . "'");
  
 }
 
 function __draw($Row) {
  $ReferansText = "";
  if(!empty($this->ReferansColumn))
   $ReferansText = '?' . $this->ReferansColumn . '=' . $Row[$this->ReferansColumn];
  
  $URLText = 'href="' . $this->Page["PageURL"] . $ReferansText . '"';
  if($this->RoleCheck == false) {
   $URLText = 'tooltip="Bu alana yetkiniz yok." disabled';
  }
  
  return '<a class="w3-btn w3-teal w3-round-xlarge" ' . $URLText . '>' . $this->Page["PageDescription"] . '</a>';
 }
}

?>
