<?php
    /**
     * Plugin para Trabalhar com Upload de Arquivos
     * @author Arilson Gonçalves da Rosa -> Analista de Sistemas/Desenvolvedor Web/Mobile
     *
     */
    class uploadHelper{
    
        private $path = UPLOAD_PATH,$file,$filename,$fileTmpName;
		
		/*
		   Verifica o mime type		   
		*/
		public function validateMimeType(Array $mimelist,$file){
		    
			 //Verifica se o Mime Type é compativel com a lista
			 if(!in_array($_FILES[$file]['type'],$mimelist)){
			       //Mime type fora da lista, retorna falso
			       return false;
			 }
			
			//Todos os mime types dos arquivos estão na lista, retorna verdadeiro
			return true;
		}
		
		//Verifica se o arquivo excede o tamanho máximo
		public function validateSize($file,$maximumsize){
		
		    return ($_FILES[$file]['size'] > $maximumsize);
		}
    
        public function setPath( $path ){
             $this->path = $path;
        }
    
        public function setFile($file){ 
             if($_FILES[$file]['size'] > 0){
				 $this->file = $_FILES[$file];             
				 $this->setFileName($file);
				 $this->setFileTmpName();  
			 }
        }
		
		public function getFileName(){
		
		   return $this->filename;
		}
    
        private function setFileName($file){
		
		     //Instancia o Helper Principal
			 $HelperPrincipal = HelperFactory::getInstance();
			 
			 //Trata o nome do arquivo
			 $this->filename = $HelperPrincipal->TirarAcentos($this->file['name']);
			 $this->filename = str_replace(' ', '_', strtolower(date("dmYHis")."_".$this->filename));			 
        }
    
        private function setFileTmpName(){
             $this->fileTmpName = $this->file['tmp_name'];        
        }
        
        public function upload(){
            if(move_uploaded_file($this->fileTmpName, $this->path . $this->filename)){
            	return  true;
            }else{
            	return false;
            }        
        }  

        public function deleteFile($filepath){        	
        	//Verifica se o arquivo Existe
        	if(file_exists($filepath)){   
        	  //Apaga o arquivo	     	
              unlink($filepath);
              //Retorna True
              return true;
        	}else{
              //Retorna Falso		
              return false;		
        	}
        }
    }