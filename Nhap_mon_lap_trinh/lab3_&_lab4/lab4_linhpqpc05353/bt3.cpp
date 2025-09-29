/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>
int main()
{
	int so, i = 2, check = 0;
	printf("Moi nhap so: ");
	scanf("%d", &so);
	
	while (i <= so) 
	{
		if (so == i * i) {
			check = 1;
			break;
		}
		i++;
	}
	
	if (check == 1) {
		printf("%d la so chinh phuong", so);
	} else {
		printf("%d khong phai la so chinh phuong", so);
	}
	return 0;
}
