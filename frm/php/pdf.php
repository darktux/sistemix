<?php
include_once('../../fpdf181/fpdf.php');
//echo 'holaaaaaaa';
class PDF extends FPDF
{
    protected $B = 0;
protected $I = 0;
protected $U = 0;
protected $HREF = '';

function WriteHTML($html)
{
    // HTML parser
    $html = str_replace("\n",' ',$html);
    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            // Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(5,$e);
        }
        else
        {
            // Tag
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                // Extract attributes
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag, $attr)
{
    // Opening tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF = $attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
}

function CloseTag($tag)
{
    // Closing tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF = '';
}

function SetStyle($tag, $enable)
{
    // Modify style and select corresponding font
    $this->$tag += ($enable ? 1 : -1);
    $style = '';
    foreach(array('B', 'I', 'U') as $s)
    {
        if($this->$s>0)
            $style .= $s;
    }
    $this->SetFont('',$style);
}
    function Footer()
    {
        //echo 'footer';
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Este es el pie de página creado con el método Footer() de la clase creada PDF que hereda de FPDF','T',0,'C');
    }
 
    function Header()
    {
        $this->SetFont('Arial','B',16);
        $this->SetLineWidth(1);
        //$this->Line(10,10,206,10);
        $this->Line(40,16,175,16);
 
        $this->Cell(30,5,'',0,0,'C',$this->Image('../../img/logo.png', 10,7, 19));
        $this->Cell(135,5,'CO-AGESALUD DE R.L.',0,0,'C');

        //$this->Cell(40,5,'',0,0,'C',$this->Image('../../img/logoInsafocop.jpeg', 188, 7, 17));
        $this->Ln(7);
        $this->SetFont('Arial','B',8);
        $this->Cell(195,8,'CONTRATO DE APERTURA DE CUENTA DE AHORRO EN U.S. DOLARES',0,0,'C');
        $this->Ln(7);
        //$this->Cell(195,8,'AHORRO A LA VISTA',0,0,'C');

        $this->Ln(10);
    }
 
    function ImprimirTexto($file)
    {
        $txt = file_get_contents($file);
        $this->SetFont('Arial','',12);
        $this->MultiCell(0,5,$txt);
 
    }
 
   
 
   /* function datos($datos){
 
        $this->SetXY(90,105);
        $this->SetFont('Arial','',12);
        foreach($datos as $columna)
        {
            $this->Cell(65,7,utf8_decode($columna['tipocuenta_id']),'TRB',2,'L' );
            $this->Cell(65,7,utf8_decode($columna['tipocuenta_nombre']),'TRB',2,'L' );
            
        }
    }
 */
    //El método tabla integra a los métodos cabecera y datos
   
 
}//fin clase PDF
//echo 'exitoooooooo';
?>