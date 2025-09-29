/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>
#include <string.h>

int main()
{
    char str[100];
    int nguyenAm = 0, phuAm = 0;
    printf("Moi nhap chuoi ky tu: ");
    gets(str);

    for (int i = 0; i < strlen(str); i++)
    {
        if (str[i] == 'a' || str[i] == 'o' || str[i] == 'e' || str[i] == 'u' || str[i] == 'i') 
            nguyenAm++;
        else if (str[i] != ' ') phuAm++;
    }
    
    printf("Chuoi vua nhap co %d nguyen am\n", nguyenAm);
    printf("Chuoi vua nhap co %d phu am\n", phuAm);
    return 0;
}
