#include <stdio.h>
#include <string.h>

int main() {
	int a[100], n, i;
	printf("Moi nhap so luong phan tu: ");
	scanf("%d", &n);
	
	for (i = 0; i < n; i++) {
		printf("Moi nhap phan tu a[%d]= ", i);
		scanf("%d", &a[i]);
	}
	
	printf("Mang vua nhap la:\n");
	for (i = 0; i < n; i++) 
		printf("a[%d] = %d\n", i, a[i]);
		
	int x, diem = 0;
	printf("Moi nhap gia tri can tim x = ");
	scanf("%d", &x);
	for (i = 0; i < n; i++)
		if (a[i] == x) {
			diem++;
			break;
		}
	
	if (diem > 0) printf("Vi tri xuat hien dau tien cua %d la %d", x, i);
	else printf("Khong tim thay");
	return 0;
}
