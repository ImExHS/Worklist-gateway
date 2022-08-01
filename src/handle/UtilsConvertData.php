<?php

namespace App\handle;

class UtilsConvertData
{
    public function convertDataPacs(array $studyList)
    {   
        $studyListConverter = []; 

        foreach($studyList as $study)
        {

            $studyArray = ['studyUID' => array_key_exists("0020000D", $study) ?  (count($study["0020000D"]) === 1 ? '' : $study["0020000D"]['Value'][0]) : '',
                            'studyId' => array_key_exists("00200010", $study) ?  (count($study["00200010"]) === 1 ? '' : $study["00200010"]['Value'][0]) : '',
                            'studyName' => array_key_exists("00081030", $study) ?  (count($study["00081030"]) === 1 ? '' : $study["00081030"]['Value'][0]) : '',
                            'studyDate' => array_key_exists("00080020", $study) ?  (count($study["00080020"]) === 1 ? '' : $this->convertDate($study["00080020"]['Value'][0])) : '',
                            'studyTime' => array_key_exists("00080030", $study) ?  (count($study["00080030"]) === 1 ? '' : $this->convertTime($study["00080030"]['Value'][0])) : '',
                            'modalities' => array_key_exists("00080061", $study) ?  (count($study["00080061"]) === 1 ? '' : $study["00080061"]['Value']) : '',
                            'referringPhysician' => array_key_exists("00080090", $study) ?  (count($study["00080090"]) === 1 ? '' : $study["00080090"]['Value'][0]["Alphabetic"]) : '',
                            'retriveUrl' => array_key_exists("00081190", $study) ?  (count($study["00081190"]) === 1 ? '' : $study["00081190"]['Value'][0]) : '',
                            'patientId' => array_key_exists("00100020", $study) ?  (count($study["00100020"]) === 1 ? '' : $study["00100020"]['Value'][0]) : '',
                            'patientName' => array_key_exists("00100010", $study) ?  (count($study["00100010"]) === 1 ? '' : $study["00100010"]['Value'][0]["Alphabetic"]) : '',
                            'birthDatePatient' => array_key_exists("00100030", $study) ?  (count($study["00100030"]) === 1 ? '' : $this->convertDate($study["00100030"]['Value'][0])) : '',
                            'sexPatient' => array_key_exists("00100040", $study) ?  (count($study["00100040"]) === 1 ? '' : $study["00100040"]['Value'][0]) : ''];

            array_push($studyListConverter, $studyArray);
                
        }
        return $studyListConverter;
    }

    public function convertDate($date)
    {
        $studyDate = substr($date, 0, 4) .'-'. substr($date, 4, 2) .'-'. substr($date, 6, 2);

        return $studyDate;
    }

    public function convertTime($time)
    {
        $studyDate = substr($time, 0, 2) .':'. substr($time, 2, 2) .':'. substr($time, 4, 2);

        return $studyDate;
    }

    
    
}
        
        