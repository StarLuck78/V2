<?php
	include('header.php');
?>
<HTML>
<HEAD>
   <TITLE>Un mot à trouver</TITLE>
<SCRIPT LANGUAGE="JavaScript" SRC="../../retour.js"></SCRIPT><STYLE type="text/CSS">.bouton {  font-size:1.2em; font-family:Verdana,Arial,sans-serif;color:#000000;border-color:#999999; border-top-width:2;  border-bottom-width:2;  border-left-width:2px;  border-right-width:2;width:40px;height:40px; background:#FFFFFF;}
.texte{  font-size:1.2em; font-family:Verdana,Arial,sans-serif;text-align:center;color:#000000;  background:#FFFFFF;border-top-width:0;  border-bottom-width:0;border-left-width:0px;  border-right-width:0}
.texte2{  font-size:1.1em; font-family:Verdana,Arial,sans-serif;text-align:center;color:#000000;  background:#FFFFFF;border-top-width:0;  border-bottom-width:0;border-left-width:0px;  border-right-width:0}</STYLE><SCRIPT><!--
nbMots=51;
//Liste des mots
var mots = new Array("PLAGE","SABLE","DUNE","GALET","ROCHER","FALAISE","PHARE","VAGUE","ALGUE","COQUILLAGE","OURSIN","ETOILE DE MER","CRABE","CREVETTE","MOULE","POISSON","PECHEUR","PECHER","PORT","BATEAU","PLANCHE A VOILE","VOILIER","MAITRE NAGEUR","BAIGNADE","NAGER","NATATION","SE BAIGNER","PARASOL","TRANSAT","CREME SOLAIRE","MAILLOT DE BAIN","PLONGEE","PLONGER","SURFER","TUBA","PALMES","MASQUE","LUNETTES DE SOLEIL","CHAPEAU","BALLON","CERF-VOLANT","CHAR A VOILE","CHATEAU DE SABLE","PELLE","RATEAU","SEAU","MOUETTE","BOUEE","MEDUSE","SURF","EPUISETTE");
var motsEcrits= new Array(2);

function depart() {
    test=1;
    document.Formu.pendu.value=" ";
    document.Formu.Message.value=" ";
    numMot=Math.floor(Math.random()*nbMots);
    //prÃ©parer ecriture mot
        x="";
        for (j=0; j<mots[numMot].length; j++) {
            if (mots[numMot].charAt(j)==" ") {
                x=x+" ";
            } else {
                if (mots[numMot].charAt(j)=="-") {
                    x=x+"-";
                } else {
                    if (mots[numMot].charAt(j)=="'") {
                        x=x+"'";
                    } else {
                        x=x+"_";
                    }
                }
            }        
        }
        motsEcrits[0]=x;
    ecrire();
    pasBonnes="";
    test=0;
}

function ecrire() {
        x="";
        for (j=0; j<motsEcrits[0].length; j++) {
            x=x+motsEcrits[0].charAt(j)+" ";    
        }
        document.Formu.mot0.value=x;
}

function choixLettre(l) {
    if (test==0) {
        test=1;
        n=0;
            for (j=0; j<mots[numMot].length; j++) {
                if (l==mots[numMot].charAt(j)) {
                    n=1;
                    motsEcrits[0]=motsEcrits[0].substring(0,j)+l+motsEcrits[0].substring(j+1,mots[numMot].length)
                }
            }
        if (n!=1) {
            pasBonnes=l+pasBonnes;
            ecrire2();
            //si 10 pas bonnes, perdu
            if (pasBonnes.length==10) {
                    document.Formu.pendu.value="PERDU"+"\n"+"PERDU"+"\n"+"PERDU"+"\n"+"PERDU"+"\n"+"PERDU"+"\n"+"PERDU"+"\n"+"PERDU"+"\n"+"PERDU"+"\n"+"PERDU"+"\n"+"PERDU"+"\n";
                document.Formu.Message.value="Perdu :(";
                motsEcrits[0]=mots[numMot]
                ecrire();
            } else {
                test=0;
            }        
        } else {
            ecrire();
            //tester si gagnÃ©
            if (mots[numMot]==motsEcrits[0]) {
                document.Formu.pendu.value=" \n"+"\n"+"\n"+"\n"+"\n"+"VICTOIRE !!!";
                document.Formu.Message.value="VICTOIRE !!!";
            } else {
                test=0;
            }
        }
    }
}

function ecrire2() {
    ch=" ";
    for (i=0; i<10-pasBonnes.length; i++) {
        ch=ch+"\n";
    }
    for (i=0; i<pasBonnes.length; i++) {
        l="";
        //for (j=0; j<11; j++) {
        for (j=0; j<5; j++) {
            l=l+pasBonnes.charAt(i);
        }
        ch=ch+l+"\n";
    }
    document.Formu.pendu.value=ch;
}

//--></SCRIPT>

<script type="text/javascript">
//<![CDATA[
var gs_d=new Date,DoW=gs_d.getDay();gs_d.setDate(gs_d.getDate()-(DoW+6)%7+3);
var ms=gs_d.valueOf();gs_d.setMonth(0);gs_d.setDate(4);
var gs_r=(Math.round((ms-gs_d.valueOf())/6048E5)+1)*gs_d.getFullYear();
var gs_p = (("https:" == document.location.protocol) ? "https://" : "http://");
document.write(unescape("%3Cscript src='" + gs_p + "s.gstat.orange.fr/lib/gs.js?"+gs_r+"' type='text/javascript'%3E%3C/script%3E"));
//]]>
</script>
</HEAD>

<BODY BGCOLOR="#000000" onload="depart();">
<P><FORM ACTION="" METHOD=POST name=Formu>
   <CENTER><FONT SIZE="+1" COLOR="#FFFFFF"><B><A NAME=jeu></A></B></FONT><TABLE BORDER=0 CELLSPACING=0 CELLPADDING=12>
      <TR>
         <TD>
            <P></P>
         </TD>
         <TD>

            <CENTER><FONT SIZE="+2" COLOR="#000000"><B>Vacances
            à la mer</B></FONT></CENTER>
         </TD>
      </TR>
      <TR>
         <TD VALIGN=bottom ROWSPAN=2>
            <P><TABLE BORDER=1 BGCOLOR="#E0CDA9" CELLPADDING=10>
               <TR>

                  <TD>
                     <CENTER><TEXTAREA NAME=pendu ROWS=11 COLS=17 WRAP=physical class=texte2></TEXTAREA></CENTER>
                  </TD>
               </TR>
            </TABLE>
            </P>
         </TD>
         <TD>

            <CENTER><TABLE BORDER=1 BGCOLOR="#E0CDA9" CELLPADDING=10>
               <TR>
                  <TD>
                     <CENTER><INPUT TYPE=text NAME=mot0 VALUE="" SIZE=32 class=texte></CENTER>
                  </TD>
               </TR>
            </TABLE>
            </CENTER>
         </TD>

      </TR>
      <TR><TD VALIGN=bottom>
            <CENTER><TABLE BORDER=1 BGCOLOR="#E0CDA9" CELLPADDING=6>
               <TR>
                  <TD>
                     <CENTER><TABLE BORDER=0 CELLSPACING=3 CELLPADDING=0>
                        <TR>
                           <TD>
                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" A " class=bouton onclick="choixLettre('A');"></CENTER>

                           </TD>
                           <TD>
                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" B " class=bouton onclick="choixLettre('B');"></CENTER>
                           </TD>
                           <TD>
                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" C " class=bouton onclick="choixLettre('C');"></CENTER>
                           </TD>
                           <TD>
                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" D " class=bouton onclick="choixLettre('D');"></CENTER>

                           </TD>
                           <TD>
                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" E " class=bouton onclick="choixLettre('E');"></CENTER>
                           </TD>
                           <TD>
                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" F " class=bouton onclick="choixLettre('F');"></CENTER>
                           </TD>
                           <TD>
                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" G " class=bouton onclick="choixLettre('G');"></CENTER>

                           </TD>
                           <TD>
                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" H " class=bouton onclick="choixLettre('H');"></CENTER>
                           </TD>
                           <TD>
                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" I " class=bouton onclick="choixLettre('I');"></CENTER>
                           </TD>
                        </TR>
                     </TABLE>

                      <TABLE BORDER=0 CELLSPACING=4 CELLPADDING=0>
                        <TR>
                           <TD>
                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" J " class=bouton onclick="choixLettre('J');"></CENTER>
                           </TD>
                           <TD>
                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" K " class=bouton onclick="choixLettre('K');"></CENTER>
                           </TD>
                           <TD>

                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" L " class=bouton onclick="choixLettre('L');"></CENTER>
                           </TD>
                           <TD>
                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" M " class=bouton onclick="choixLettre('M');"></CENTER>
                           </TD>
                           <TD>
                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" N " class=bouton onclick="choixLettre('N');"></CENTER>
                           </TD>
                           <TD>

                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" O " class=bouton onclick="choixLettre('O');"></CENTER>
                           </TD>
                           <TD>
                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" P " class=bouton onclick="choixLettre('P');"></CENTER>
                           </TD>
                           <TD>
                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" Q " class=bouton onclick="choixLettre('Q');"></CENTER>
                           </TD>
                        </TR>

                     </TABLE>
                      <TABLE BORDER=0 CELLSPACING=4 CELLPADDING=0>
                        <TR>
                           <TD>
                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" R " class=bouton onclick="choixLettre('R');"></CENTER>
                           </TD>
                           <TD>
                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" S " class=bouton onclick="choixLettre('S');"></CENTER>
                           </TD>

                           <TD>
                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" T " class=bouton onclick="choixLettre('T');"></CENTER>
                           </TD>
                           <TD>
                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" U " class=bouton onclick="choixLettre('U');"></CENTER>
                           </TD>
                           <TD>
                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" V " class=bouton onclick="choixLettre('V');"></CENTER>
                           </TD>

                           <TD>
                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" W " class=bouton onclick="choixLettre('W');"></CENTER>
                           </TD>
                           <TD>
                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" X " class=bouton onclick="choixLettre('X');"></CENTER>
                           </TD>
                           <TD>
                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" Y " class=bouton onclick="choixLettre('Y');"></CENTER>
                           </TD>

                           <TD>
                              <CENTER><INPUT TYPE=button NAME=Rejouer VALUE=" Z " class=bouton onclick="choixLettre('Z');"></CENTER>
                           </TD>
                        </TR>
                     </TABLE>
                     </CENTER>
                  </TD>
               </TR>
            </TABLE>

            </CENTER>
         </TD>
      </TR>
   </TABLE>
   
   <HR>
   
   <TABLE BORDER=0 CELLSPACING=0 CELLPADDING=2>
      <TR>
         <TD ROWSPAN=2 WIDTH=240>
            <CENTER><INPUT TYPE=text NAME=Message VALUE="" SIZE=20></CENTER>

         </TD>
         <TD WIDTH=150>
            <CENTER><button type="button" class="btn btn-outline-secondary m-2" onclick="depart()">Rejouer</button></CENTER></CENTER>
         </TD>
        
      </TR>
   </TABLE>
   
   <HR>
    <button type="button" class="btn btn-outline-secondary m-2" onclick="window.location.href='pendu.php'">Retour</a></button>

   </CENTER>


</script>
</BODY>
</HTML>

<?php require("footer.php"); ?>