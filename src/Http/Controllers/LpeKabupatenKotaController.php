<?php namespace Bantenprov\LpeKabupatenKota\Http\Controllers;

/* require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\LpeKabupatenKota\Facades\LpeKabupatenKota;

/* Models */
use Bantenprov\LpeKabupatenKota\Models\Bantenprov\LpeKabupatenKota\LpeKabupatenKota as PdrbModel;
use Bantenprov\LpeKabupatenKota\Models\Bantenprov\LpeKabupatenKota\Province;
use Bantenprov\LpeKabupatenKota\Models\Bantenprov\LpeKabupatenKota\Regency;

/* etc */
use Validator;

/**
 * The LpeKabupatenKotaController class.
 *
 * @package Bantenprov\LpeKabupatenKota
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class LpeKabupatenKotaController extends Controller
{

    protected $province;

    protected $regency;

    protected $pdrb;

    public function __construct(Regency $regency, Province $province, PdrbModel $pdrb)
    {
        $this->regency  = $regency;
        $this->province = $province;
        $this->pdrb     = $pdrb;
    }

    public function index(Request $request)
    {
        /* todo : return json */

        return 'index';

    }

    public function create()
    {

        return response()->json([
            'provinces' => $this->province->all(),
            'regencies' => $this->regency->all()
        ]);
    }

    public function show($id)
    {

        $pdrb = $this->pdrb->find($id);

        return response()->json([
            'negara'    => $pdrb->negara,
            'province'  => $pdrb->getProvince->name,
            'regencies' => $pdrb->getRegency->name,
            'tahun'     => $pdrb->tahun,
            'data'      => $pdrb->data
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'negara'        => 'required',
            'province_id'   => 'required',
            'regency_id'    => 'required',
            'kab_kota'      => 'required',
            'tahun'         => 'required|integer',
            'data'          => 'required|integer',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'title'     => 'error',
                'message'   => 'add failed',
                'type'      => 'failed',
                'errors'    => $validator->errors()
            ]);
        }

        $check = $this->pdrb->where('regency_id',$request->regency_id)->where('tahun',$request->tahun)->count();

        if($check > 0)
        {
            return response()->json([
                'title'         => 'error',
                'message'       => 'Data allready exist',
                'type'          => 'failed',
            ]);

        }else{
            $data = $this->pdrb->create($request->all());

            return response()->json([
                    'type'      => 'success',
                    'title'     => 'success',
                    'id'      => $data->id,
                    'message'   => 'PDRB '. $this->regency->find($request->regency_id)->name .' tahun '. $request->tahun .' successfully created',
                ]);
        }

    }

    public function update(Request $request, $id)
    {
        /* todo : return json */
        return '';

    }

    public function destroy($id)
    {
        /* todo : return json */
        return '';

    }
}

