<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

interface KontrakView{
	public function tampil();
	public function tampilAdd();
	public function addData();
	public function tampilUpdate($id);
	public function tampilDelete($id);
}
?>