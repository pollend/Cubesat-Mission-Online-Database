<?php 

class HtmlListedSubformFragment 
{
	private $_inputs = array();
	private $_hiddenInput = array();
	private $_submitButton;
	private $_formName;
	function __construct($formName)
	{
		$this->_formName = $formName;
	}

	public function AddHiddenInput($name,$value="")
	{
		array_push($this->_hiddenInput,"<input type='hidden' name='". $this->GetName($name)."' value='".$value."'/>");
	}

	public function AddTextInput($name,$labelName,$value="")
	{
		array_push($this->_inputs, array("name" => $name,"label" => $labelName, "output" => "<input class='form-control' type='text' name='".$this->GetName($name)."' value='".$value."'/>"));
	}

	public function AddUploadButton($name,$labelName,$value="")
	{
		array_push($this->_inputs, array("name" => $name,"label" => $labelName, "output" => "<input class='form-control' type='file' name='".$this->GetName($name)."' value='".$value."'/>"));
	}


	public function AddPasswordInput($name,$labelName,$value="")
	{
		array_push($this->_inputs, array("name" => $name,"label" => $labelName, "output" => "<input class='form-control' type='password' name='".$this->GetName($name)."' value='".$value."'/>"));
	}

	public function AddTextarea($name,$labelName,$value="")
	{
		array_push($this->_inputs, array("name" => $name,"label" => $labelName, "output" => "</br><textarea type='text' class='form-control' rows='3' name='".$this->GetName($name)."' >".$value."</textarea>"));
	}

	public function AddInput($name,$labelName,$value)
	{
		array_push($this->_inputs, array("name" => $name,"label" => $labelName, "output" => $value));
	}

	public function AddFragment($name,$labelName,$value)
	{
		array_push($this->_inputs, array("name" => $name,"label" => $labelName, "fragment" => $value));
	}

	public function AddFragmentBlock($value)
	{
		array_push($this->_inputs, array( "framgmentblock" => $value));
	}

	public function AddBlock($contents)
	{
		array_push($this->_inputs, array( "block" => $contents));
	}

	public function AddSubmitButton($contents, $classes = "")
	{
		array_push($this->_inputs, array( "block" => "<input class='btn btn-default ".$classes."' type='submit' value='".$contents."'/>"));
	}

	public function GetName($name)
	{
		return this->_formName . "[". $name . "]";
	}

	public function Output()
	{
		?>
		<div class="list_Container">

			<?php for($x =0; $x < count($this->_hiddenInput);$x++) : ?>
				<?php echo $this->_hiddenInput[$x]; ?>
			<?php endfor;?>

			<?php for($x =0; $x < count($this->_inputs);$x++) : ?>
				<?php
				if(isset($this->_inputs[$x]["block"]))
					echo $this->_inputs[$x]["block"];
				else if(isset($this->_inputs[$x]["framgmentblock"]))
					$this->_inputs[$x]["framgmentblock"]->Output();
				else
				{
				?>
					<div class="form-group">
							<label label_id="<?php echo $this->_inputs[$x]["name"]; ?>"><?php echo $this->_inputs[$x]["label"]; ?></label>
						<?php
						if(isset($this->_inputs[$x]["output"]))
							 echo $this->_inputs[$x]["output"];
						else
							$this->_inputs[$x]["fragment"]->Output();

						 ?>
					</div>
				<?php }?>

			<?php endfor;?>
			<div  class="form-group">
			<?php if(isset($this->_submitButton)) echo $this->_submitButton;  ?>
			</div>
		</div>
		<?php

	}
}

?>