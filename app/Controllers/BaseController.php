<?php

namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;
use App\Models\Modelsoal;
use App\Models\Modelkonfigurasi;
use App\Models\Modelgelombang;
use App\Models\Modelkategori;
use App\Models\Modelppdb;
use App\Models\Modeluser;
use App\Models\Modeljadwal;
use App\Models\Modeljawaban;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['form', 'url', 'Tgl_indo'];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		$this->session = \Config\Services::session();
		$this->konfigurasi = new Modelkonfigurasi;
		$this->user = new Modeluser;
		$this->ppdb = new Modelppdb;
		$this->gelombang = new Modelgelombang;
		$this->soal = new Modelsoal;
		$this->kategori = new Modelkategori;
		$this->jadwal = new Modeljadwal;
		$this->jawaban = new Modeljawaban;
	}
}
