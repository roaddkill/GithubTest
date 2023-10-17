<?php

--'NONRESIDENTIALUNIT20' , 'NONRESIDENTIALBUILD20'
if (
                    AL3System == "AMS360_COMMERCIAL" || 
                    AL3System == "AMS_SAGITTA" ||
                    AL3System == "APPLIED_EPIC" ||
                    AL3System == "APPLIED_VISION" ||
                    AL3System == "DORIS" ||
                    AL3System == "DORIS_ONLINE" ||
                    AL3System == "INSTAR" ||
                    AL3System == "NEXSURE"
               )
            {
                bCommercial = true;
            }
            else
            {
                bCommercial = false;
            }

--add a comment
--add 2nd comment
--add 3rd comment


sPolicyTypeRouting = "P";

if (AL3.sDownloadType == "FLOOD" && AL3.bCommercial)
{
        if (_oCommericalOccupancyCodes.Contains(AL3.PolicyInfo.OccpCode.ToString()))
            sPolicyTypeRouting = "C";
}


AND 
      (  JSON_UNQUOTE(JSON_EXTRACT(al3.metadata, '$[0].flood.personal')) = 'Y' and
         JSON_UNQUOTE(JSON_EXTRACT(al3.metadata, '$[0].flood.pcommercial')) = 'Y') or 
         (JSON_UNQUOTE(JSON_EXTRACT(al3.metadata, '$[0].flood.pcommercial')) = 'Y' and 
              (
                'NONRESIDENTIALBUILD20' 
                'NONRESIDENTIALBUSINESS' 
                'NONRESIDENTIALUNIT20' 
                'OTHERNONRESIDENTIAL'  


              )
         
         ) 
-- need to join to this to get occupancycodes
--tb_poriskadditionalfloodinfos.s_Occupancy (pf)
--WHERE pf.n_CreatedTransactionFK= $this->transactionId";
     
