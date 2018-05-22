<?php
use Illuminate\Database\Seeder;
/**
 * Usage :
 * [1] $ composer dump-autoload -o
 * [2] $ php artisan db:seed --class=BantenprovKegiatanSeeder
 */
class BantenprovKegiatanSeeder extends Seeder
{
    /* text color */
    protected $RED     ="\033[0;31m";
    protected $CYAN    ="\033[0;36m";
    protected $YELLOW  ="\033[1;33m";
    protected $ORANGE  ="\033[0;33m";
    protected $PUR     ="\033[0;35m";
    protected $GRN     ="\e[32m";
    protected $WHI     ="\e[37m";
    protected $NC      ="\033[0m";
    /* File name */
    /* location : /databse/seeds/file_name.csv */
    protected $fileName = "BantenprovKegiatanSeeder.csv";
    /* text info : default (true) */
    protected $textInfo = true;
    /* model class */
    protected $model;
    /* __construct */
    public function __construct(){
        $this->model = new Bantenprov\Kegiatan\Models\Bantenprov\Kegiatan\Kegiatan;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertData();
    }
    /* function insert data */
    protected function insertData()
    {
        /* silahkan di rubah sesuai kebutuhan */
        foreach($this->readCSV() as $data){

            
        	$this->model->create([
                'id' => $data['id'],
            	'label' => $data['label'],
				'description' => $data['description'],
				'tanggal_mulai' => $data['tanggal_mulai'],
				'tanggal_selesai' => $data['tanggal_selesai'],

        	]);
        

        }

        if($this->textInfo){                
            echo "============[DATA]============\n";
            $this->orangeText('id : ').$this->greenText($data['id']);
            echo"\n";
            $this->orangeText('label : ').$this->greenText($data['label']);
			echo"\n";
			$this->orangeText('description : ').$this->greenText($data['description']);
			echo"\n";
			$this->orangeText('tanggal_mulai : ').$this->greenText($data['tanggal_mulai']);
			echo"\n";
			$this->orangeText('tanggal_selesai : ').$this->greenText($data['tanggal_selesai']);
			echo"\n";
        
            echo "============[DATA]============\n\n";
        }

        $this->greenText('[ SEEDER DONE ]');
        echo"\n\n";
    }
    /* text color: orange */
    protected function orangeText($text)
    {
        printf($this->ORANGE.$text.$this->NC);
    }
    /* text color: green */
    protected function greenText($text)
    {
        printf($this->GRN.$text.$this->NC);
    }
    /* function read CSV file */
    protected function readCSV()
    {
        $file = fopen(database_path("seeds/".$this->fileName), "r");
        $all_data = array();
        $row = 1;
        while(($data = fgetcsv($file, 1000, ",")) !== FALSE){
            $all_data[] = [ 'id'                => $data[0],
                            'label'             => $data[1],
                            'description'       => $data[2],
                            'tanggal_mulai'     => $data[3],
                            'tanggal_selesai'   => $data[4],];
        }
        fclose($file);
        return  $all_data;
    }
}
