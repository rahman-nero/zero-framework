<?php 
namespace Zero\Cache;

/**
 * Class cache
 */
class Cache
{
	// create new cache-file, work before $time
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
	// get cache-file, if end-time < now time - file will delete
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

	// function for delete cache-file
	public function delete($key) {
		$filename = CACHE . '/' . md5($key) . '.txt';
		if (is_file($filename)) {
			unlink($filename);
			return true;
		}
		return false;
	}

}

 ?>