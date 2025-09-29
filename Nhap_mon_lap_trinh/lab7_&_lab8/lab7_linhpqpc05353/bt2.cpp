/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>
#include <string.h>
int main()
{
    char userSys[] = "admin";
    int passSys = 12345;
    char user[100];
    int pass, len = 0;
    printf("Moi nhap username: ");
    gets(user);
    printf("Moi nhap password: ");
    scanf("%d", &pass);

    for (int i = 0; i < strlen(userSys); i++)
    {
        if (user[i] == userSys[i]) len++;
    }
    
    
    if (len == strlen(userSys) && pass == passSys) printf("Dang nhap thanh cong\n");
    else printf("Dang nhap khong thanh cong\n");
    return 0;
}
