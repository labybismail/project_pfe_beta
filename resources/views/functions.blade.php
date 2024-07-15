@php
use Carbon\Carbon;

function patientProfileImage($nom, $prenom)
{
    $extensions = ['jpg', 'jpeg', 'png', 'gif'];
    foreach ($extensions as $ext) {
        $filename = public_path(
            "storage/patients/{$nom}_{$prenom}.{$ext}",
        );
        if (file_exists($filename)) {
            return asset(
                "storage/patients/{$nom}_{$prenom}.{$ext}",
            );
        }
    }
    return asset('storage/doctors/default.jpg');
}



function get_age_int($dateNaissance){

    $dateNaissance = Carbon::parse($dateNaissance);
    $formattedDate = $dateNaissance->format('j F Y');  
    return (int)$dateNaissance->diffInYears(Carbon::now());
}
@endphp