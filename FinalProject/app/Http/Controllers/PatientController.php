namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    // Ensures only authenticated doctors can access these routes
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Display all patients for the logged-in doctor
    public function index()
    {
        $patients = Patient::where('doctor_id', Auth::id())->get(); // Fetch patients for the logged-in doctor
        return view('patients.index', compact('patients'));
    }

    // Show the form to create a new patient
    public function create()
    {
        return view('patients.create');
    }

    // Store a new patient record
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'contact_info' => 'required',
            'medical_history' => 'required',
        ]);

        Patient::create([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'contact_info' => $request->contact_info,
            'medical_history' => $request->medical_history,
            'doctor_id' => Auth::id(), // Store the doctor ID
        ]);

        return redirect()->route('patients.index');
    }

    // Show the form to edit a patient's details
    public function edit(Patient $patient)
    {
        // Ensure that the patient belongs to the logged-in doctor
        if ($patient->doctor_id !== Auth::id()) {
            return redirect()->route('patients.index');
        }
        return view('patients.edit', compact('patient'));
    }

    // Update a patient's record
    public function update(Request $request, Patient $patient)
    {
        // Ensure that the patient belongs to the logged-in doctor
        if ($patient->doctor_id !== Auth::id()) {
            return redirect()->route('patients.index');
        }

        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'contact_info' => 'required',
            'medical_history' => 'required',
        ]);

        $patient->update($request->all());

        return redirect()->route('patients.index');
    }

    // Delete a patient's record
    public function destroy(Patient $patient)
    {
        // Ensure that the patient belongs to the logged-in doctor
        if ($patient->doctor_id !== Auth::id()) {
            return redirect()->route('patients.index');
        }

        $patient->delete();

        return redirect()->route('patients.index');
    }
}
