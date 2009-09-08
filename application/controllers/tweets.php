<?php
class Tweets extends MY_Controller {

	function index()
	{
		$words = new Word();	
		$data['words'] = $words->order_by('order')->get();
		$this->load->view('twistori/index',$data);
	}
	
	function getTwistoriTweets($id,$page=1,$rpp=100)
	{
		$word = new Word($id);
		$tweets = $this->twitter->search('search', array('q' => $word->title,'rpp' => $rpp,'page'=>$page));
		
		$all_texts = array();
		foreach($tweets->results as $tweet)
		{
			$all_texts []= preg_replace('/'.$word->title.'/i',"<span class='word' style='color:".$word->color."'>".$word->title."</span>", $tweet->text,1);
		}
		
		/*
		foreach($tweets->results as $tweet)
		{
			$all_texts []= $tweet->text;
		}
		*/
		
		if(isAjax())
		{
			$this->output->set_output(json_encode($all_texts));
		}
		else
		{
			$data['texts'] = $all_texts;
			$this->load->view('twistori/getTwistoriTweetsById',$data);
		}
		
		if(!empty($all_texts))
			$this->output->cache(240);
		
	}
}