<?php
class Words extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata('logged_in'))
		{
			set_flash('message','failed','You must login first.');
			redirect('users/login');
		}
		// Must Login
	}

	function index()
	{
		$words = new Word();
		$data['words'] = $words->order_by('order')->get();
		$this->load->view('words/index',$data);
	}
	
	function add()
	{
		$this->load->view('words/add');
	}
	
	function create()
	{
		if($this->input->post('word_submit'))
		{
			$word_title = $this->input->post('word_title');
			$word_color = $this->input->post('color');
			$word = new Word();
			$word->title = $word_title;
			$word->color = $word_color;
			$word->save();
			set_flash('message','success','Add Word Complete');
			redirect('words/add');
		}
		else
		{
			echo "You must enter word from form.";
		}
	}
	
	function edit($id)
	{
		$data['word'] = new Word($id);
		$this->load->view('words/edit',$data);
	}
	
	function update()
	{
		if($this->input->post('word_submit'))
		{
			$word_id = $this->input->post('word_id');
			$word_title = $this->input->post('word_title');
			$word_color = $this->input->post('color');
			
			$word = new Word($word_id);
			$word->title = $word_title;
			$word->color = $word_color;
			
			$word->save();
			$uri_str = 'tweets/getTwistoriTweets/'.$word_id.'/1';
			$url= site_url($uri_str);
	
			$cache_path = $this->output->clear_cache($uri_str);
			set_flash('message','success','Update Word Complete and clear cache at '.$cache_path);
			redirect('words');
		}
		else
		{
			echo "You must update word from form.";
		}
	}
	
	function delete($id)
	{
		$word = new Word($id);
		$word->delete();
		set_flash('message','success','Delete Word Complete');
		redirect('words');
	}
	
	function changeOrder()
	{
		if($this->input->post('sequence_ids'))
		{
			$sequence_ids = explode(',',$this->input->post('sequence_ids'));
			foreach($sequence_ids as $key => $id)
			{
				$word = new Word($id);
				$word->order = $key;
				$word->save();
			}
			if(isAjax())
			{
				echo "Change Order Complete";
			}
			else
			{
				set_flash('message','success','Change Order Complete');
				redirect('words');
			}
		}
		else
		{
			echo "You must submit sequence id from form.";
		}
	}
	
}
?>