<?php

class Site extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		if ($this->session->userdata('login') OR $this->session->userdata('logged'))
		{
			redirect('site/profil');
		}

		$this->form_validation->set_rules('prenom', 'Prénom', array('trim', 'required', 'max_length[255]'));
		$this->form_validation->set_rules('nom', 'Nom', array('trim', 'required', 'max_length[255]'));
		$this->form_validation->set_rules('mail', 'Adresse Mail', array('trim', 'required', 'valid_email', 'is_unique[user.mail]', 'max_length[255]'));
		$this->form_validation->set_rules('mail1', 'Confirmation Adresse Mail', array('trim', 'required', 'valid_email', 'matches[mail]', 'max_length[255]'));
		$this->form_validation->set_rules('mdp', 'Mot de Passe', array('trim', 'required', 'min_length[6]', 'max_length[255]'));
		$this->form_validation->set_rules('mdp1', 'Confirmation Mot de Passe', array('trim', 'required', 'min_length[6]', 'matches[mdp]', 'max_length[255]'));

		if ($this->form_validation->run())
		{	
			$data = array(
				'prenom' => $this->input->post('prenom'),
				'nom' => $this->input->post('nom'),
				'role' => 'Utilisateur',
				'mail' => $this->input->post('mail'),
				'mdp' => hash('sha256', $this->input->post('mdp'))
			);
			$this->site_model->create($data);

			$this->email->from('jean-francois.ngo@epita.fr', 'Admin');
			$this->email->to($this->input->post('mail'), 'Confirmation Inscription');
			$this->email->subject('Confirmation Inscription');
			$this->email->message('<h4>Bienvenue</h4>
				<p>Vous êtes maintenant membre du site.</p>');

			$this->email->send();
			$data['success'] = 'Inscription réussie';

			$this->load->view('connexion', $data);
		}
		else
		{
			$this->load->view('form');
		}
	}

	function login()
	{
		if ($this->session->userdata('login') OR $this->session->userdata('logged'))
		{
			redirect('site/profil');
		}
		$this->form_validation->set_rules('mail', 'Adresse Mail', array('trim', 'required'));
		$this->form_validation->set_rules('mdp', 'Mot de Passe', array('trim', 'required'));

		if ($this->form_validation->run())
		{
			if ($this->site_model->check_id($this->input->post('mail'), $this->input->post('mdp')))
			{
				$data = array(
					'login' => $this->input->post('mail'),
					'logged' => TRUE
				);
				$this->session->set_userdata($data);
				redirect('site/profil');
			}
			else
			{
				$data['error'] = 'Mauvais identifiants.';
				$this->load->view('connexion', $data);	
			}
		}
		else
		{
			$this->load->view('connexion');		
		}
	}

	function logout()
	{
		$this->session->unset_userdata('login');
		$this->session->unset_userdata('logged');
		$this->session->sess_destroy();
		redirect('site');
	}

	function profil()
	{
		if (!$this->session->userdata('login') OR !$this->session->userdata('logged'))
		{
			redirect('site');
		}
		else
		{
			$data['user'] = $this->site_model->get_user_infos($this->session->userdata('login'));
			$this->load->view('profil', $data);
		}
	}

	function admin()
	{
		$data['users'] = $this->site_model->read();
		$data['session'] = $this->session->userdata('login');
		$this->load->view('admin', $data);
	}

	function update()
	{
		if ($this->uri->segment(3) AND is_numeric($this->uri->segment(3)))
		{
			$this->form_validation->set_rules('role', 'Rôle', array('trim', 'required', 'callback_check_role'));
			$this->form_validation->set_rules('prenom', 'Prénom', array('trim', 'required', 'max_length[255]'));
			$this->form_validation->set_rules('nom', 'Nom', array('trim', 'required', 'max_length[255]'));
			$this->form_validation->set_rules('mail', 'Adresse Mail', array('trim', 'required', 'valid_email', 'max_length[255]'));

			if ($this->form_validation->run())
			{
				$data = array(
					'role' => $this->input->post('role'),
					'prenom' => $this->input->post('prenom'),
					'nom' => $this->input->post('nom'),
					'mail' => $this->input->post('mail'),
				);
				$this->site_model->update($this->uri->segment(3), $data);
				redirect('site');
			}
			else
			{
				$data['user'] = $this->site_model->get_user($this->uri->segment(3));
				$this->load->view('update', $data);
			}
		}
		else
		{
			redirect('site');
		}
	}

	function check_role($role)
	{
		if (strcmp($role, 'Administrateur') AND strcmp($role, 'Utilisateur'))
		{
			$this->form_validation->set_message('check_role', 'The {field} field must be \'Administrateur\' or \'Utilisateur\'.');
			return FALSE;
		}
		return TRUE;
	}

	function delete()
	{
		$data['user'] = $this->site_model->get_user($this->uri->segment(3));
		if ($this->uri->segment(3) AND is_numeric($this->uri->segment(3)) AND strcmp($data['user']->mail, $this->session->userdata('login')))
		{
			$this->site_model->delete($this->uri->segment(3));
			redirect('site/admin');
		}
		else
		{
			redirect('site/admin');
		}
	}
}

?>