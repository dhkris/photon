<?php

	class Page {
		private $id = -1;
		private $alias = "";
		private $title = "";
		private $content = "";
		private $author = -1;
		private $category = -1;
		
		private $_has_read = FALSE;
		private $_original = TRUE;
		
		private $_write_new = TRUE;
		
		
		/* Database field names */
		private $_id = "id";				/* INTEGER PRIMARY KEY */
		private $_alias = "alias";			/* TEST (16 bytes) */
		private $_title = "title";			/* TEXT (64 bytes) */
		private $_content = "content";		/* TEXT (unlimited) */
		private $_author = "author";		/* INTEGER */
		private $_category = "category";	/* INTEGER */ 
		
		private $db;
		
		public function __construct($database) {
			$this->db = $database;
		}
		
		public function read() {	/* from ID so far */
			/* Read from database functionality */
			$sql = "SELECT * FROM PAGES WHERE " .$this->_id ."=" .$this->id ;
			$this->db->raw_query($sql);
			$results = $this->db->as_array();
			if(	count($results) <= 0 ) {
				echo PERR_PAGE_NOSUCH;
				return ERRCODE_PAGE_NOSUCH;
			} else {
				$respage = $results[0];	/* Assume first result. Use splicing in searching... */
				$this->_assoc = $respage;
				foreach($respage as $f => $v) {
					if($f == $this->_id):              $this->id = $v;	/* Should equal previous id... */
					elseif($f == $this->_alias):       $this->alias = $v;
					elseif($f == $this->_title):       $this->title = $v;
					elseif($f == $this->_content):     $this->content = $v;
					elseif($f == $this->_author):      $this->author = $v;
					elseif($f == $this->_category):    $this->category = $v;
					endif;
				}
				$this->_has_read = TRUE;		/* Yes, we've read... */
				$this->_original = FALSE;		/* Data not original, since we read from DB */
				$this->_write_new = FALSE;		/* Most likely a good idea to update existing row... */
			}
		}
		
		public function set_writemode_updateIfPossible () {
			/* Set writing mode to update (if possible) */
			$this->_write_new = FALSE;
		}
		
		
		/* from_blank:	Useful if you want to start with a fresh page and build it up... */
		public function from_blank() {
			
			$this->_has_read = TRUE;		/* Enable us to return values... */
			
			/* Reset all data values... */
			$this->id = -1;
			$this->author = -1;
			$this->category = -1;
			$this->title = "";
			$this->content = "";
			$this->alias = "";
		}
		
		public function set_readstate($v) {$this->_has_read=$v;}
		public function get_readstate()   {return $this->_has_read;}
		
		public function set_writemode_writeNew () {
			/* Set writing mode to always create new page (warning: this may suck immensely...) */
			$this->_write_new = TRUE;
			$this->_has_read = TRUE;	/* To enable us to actually return values... just in case! */ 
		}
		
		public function get_writemode() {return $this->_write_new;}	/* TRUE=write new, FALSE=update existing */

		
		/* Page value readers */
		public function get_id() 		{if($this->_has_read==TRUE):return $this->id;		else:return -1;endif; }
		public function get_title() 	{if($this->_has_read==TRUE):return $this->title; 	else:return -1;endif; }
		public function get_content() 	{if($this->_has_read==TRUE):return $this->content; 	else:return -1;endif; }
		public function get_author() 	{if($this->_has_read==TRUE):return $this->author; 	else:return -1;endif; }
		public function get_alias() 	{if($this->_has_read==TRUE):return $this->alias; 	else:return -1;endif; }
		public function get_category() 	{if($this->_has_read==TRUE):return $this->category;	else:return -1;endif; }
		
		/* Page value writers */
		public function set_id($v)		{$this->id=$v;}
		public function set_title($v)	{$this->title=$v;}
		public function set_content($v)	{$this->content=$v;}
		public function set_author($v)	{$this->author=$v;}
		public function set_category($v){$this->category=$v;}
		public function set_alias($v)	{$this->alias=$v;}
	}

?>
