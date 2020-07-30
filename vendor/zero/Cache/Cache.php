<?php 
namespace Zero\Cache;

/**
 * 
 */
class Cache
{
	
	public function set($key, $content, $time = 3600)
	{
		$filename = CACHE . '/' . md5($key) . '.txt';
		$data['content'] = $content;
		$data['end_time'] = time() + $time;

		if (file_put_contents($filename, serialize($data))) {
			return true;
		}
		return false;
	}

	public function get($key)
	{
		$file = CACHE . '/' . md5($key) . '.txt';
        if(file_exists($file)){
            $content = unserialize(file_get_contents($file));
            if(time() <= $content['end_time']){
                return $content['content'];
            }
            unlink($file);
        }
        return false;
	}

}

 ?>