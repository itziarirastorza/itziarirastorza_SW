<?xml version="1.0" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<HTML>
<BODY>
<TABLE border="1">
    <THEAD bgcolor="lime"> 
        <TR> <TH>Autor</TH> <TH>Enunciado</TH> <TH>Respuesta Correcta</TH> <TH>Respuestas Incorrectas</TH> <TH>Tema</TH> </TR>
    </THEAD>
    <xsl:for-each select="/assessmentItems/assessmentItem" >
    <TR>
    <TD>
    <FONT SIZE="2" COLOR="black" FACE="Verdana">
    <xsl:value-of select="@author"/> <BR/>
    </FONT>
    </TD>

    <TD>
    <FONT SIZE="2" COLOR="black" FACE="Verdana">
    <xsl:value-of select="itemBody/p"/> <BR/>
    </FONT>
    </TD>

    <TD>
    <FONT SIZE="2" COLOR="black" FACE="Verdana">
    <xsl:value-of select="correctResponse/response"/> <BR/>
    </FONT>
    </TD>

    <TD>
    <FONT SIZE="2" COLOR="black" FACE="Verdana">
    <xsl:for-each select="incorrectResponses/response">
        <LineNumber> ● <xsl:value-of select="."/><BR/></LineNumber>
    </xsl:for-each>
    </FONT>
    </TD>

    <TD>
    <FONT SIZE="2" COLOR="black" FACE="Verdana">
    <xsl:value-of select="@subject"/> <BR/>
    </FONT>
    </TD>

    </TR>
    </xsl:for-each>
</TABLE>
</BODY>
</HTML>
</xsl:template>
</xsl:stylesheet>