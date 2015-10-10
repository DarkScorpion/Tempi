<?
//Copyright (c) 2015 Александр Смит (https://github.com/DarkScorpion)
class Tempi
{
  private $_leftBound;
  private $_rightBound;

  private $_isDelete = false;
  private $_defaultReplace = '';

  public function __construct ($leftBound = '##', $rightBound = null)
  {
    if($rightBound)
    {
      $this->_leftBound = $leftBound;
      $this->_rightBound = $rightBound;
    } else {
      $this->_leftBound = $leftBound;
      $this->_rightBound = $leftBound;
    }
  }

  public function replace($html, $dataArr)
  {
    if(is_array($dataArr) || is_object($dataArr))
    {
      $lb = $this->_leftBound;
      $rb = $this->_rightBound;

      foreach ($dataArr as $key => $value)
      {
        $pattern = $lb.$key.$rb;
        $html = str_replace($pattern, $value, $html);
      }

      if ($this->_isDelete)
      {
        $delPattern = '/'.$lb.'.*'.$rb.'/i';
        $html = preg_replace($delPattern, $this->_defaultReplace, $html);
      }

      return $html;

    } else {
      throw new Exception('Tempi.replace param: Must be array or object');
    }
  }

  public function setDeleteVars($value)
  {
    $this->_isDelete = $value;
  }

  public function setDefaultReplace($value)
  {
    $this->_defaultReplace = $value;
  }

}
