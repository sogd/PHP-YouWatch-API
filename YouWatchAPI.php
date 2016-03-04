<?php
class YouWatchAPI {
    private $result;
    
    function AccountInfo(){
        $data = func_get_args();
        
        $hash[op] = 'account_info';
        $hash[key] = $data[0][key];
        
        $this->Request($hash);
        return json_decode($this->result);
    }
    
    function UploadURL(){
        $data = func_get_args();
        
        $hash[op] = 'upload_url';
        $hash[key] = $data[0][key];
        $hash[url] = $data[0][url];
        if($data[0][folder]){
            $hash[folder] = $data[0][folder];
        }
        
        $this->Request($hash);
        return json_decode($this->result);
    }
    
    function CheckUploadURL(){
        $data = func_get_args();
        
        $hash[op] = 'check_upload_url';
        $hash[key] = $data[0][key];
        $hash[id] = $data[0][id];
        
        $this->Request($hash);
        return json_decode($this->result);
    }
    
    function GetUploadServer(){
        $data = func_get_args();
        
        $hash[op] = 'get_upload_server';
        $hash[key] = $data[0][key];
        
        $this->Request($hash);
        return json_decode($this->result);
    }
    
    function CheckFiles(){
        $data = func_get_args();
        
        $hash[op] = 'check_files';
        $hash[key] = $data[0][key];
        
        if(is_array($data[0][files])){
            $list = null;
            foreach($data[0][files] as $row){
                if($list){
                    $list .= ',' . $row;
                }else{
                    $list = $row;
                }
            }
            
            $hash['list'] = $list;
        }else{
            $hash['list'] = $data[0][files];
        }
        
        $this->Request($hash);
        return json_decode($this->result);
    }
    
    function RenewFile(){
        $data = func_get_args();
        
        $hash[op] = 'file_renew';
        $hash[key] = $data[0][key];
        $hash[file_code] = $data[0][file_code];
        
        $this->Request($hash);
        return json_decode($this->result);
    }
    
    function CloneFile(){
        $data = func_get_args();
        
        $hash[op] = 'file_clone';
        $hash[key] = $data[0][key];
        $hash[file_code] = $data[0][file_code];
        if($data[0][folder]){
            $hash[folder] = $data[0][folder];
        }
        if($data[0][new_title]){
            $hash[new_title] = $data[0][new_title];
        }
        
        $this->Request($hash);
        return json_decode($this->result);
    }
    
    function CheckFilesDMCA(){
        $data = func_get_args();
        
        $hash[op] = 'files_dmca';
        $hash[key] = $data[0][key];
        if($data[0][date]){
            $hash[date] = $data[0][date];
        }
        if($data[0][order]){
            $hash[order] = $data[0][order];
        }
        
        $this->Request($hash);
        return json_decode($this->result);
    }
    
    private function Request($hash){
        $param = '?version=0.01';
        foreach($hash as $key => $value){
            if($param){
                $param .= '&' . $key . '=' . $value;
            }else{
                $param = '?' . $key . '=' . $value;
            }
        }
        
        $url = 'http://youwatch.org/cgi-bin/xapi.cgi';
        $url .= $param ? $param : '';
        
        $this->result = file_get_contents($url);
    }
}
