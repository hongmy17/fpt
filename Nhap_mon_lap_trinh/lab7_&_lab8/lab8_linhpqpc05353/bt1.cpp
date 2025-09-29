/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>
#include <string.h>

int main()
{
  int i, n;
  struct SinhVien {
    int MSSV;
    char name[50], nganhHoc[50];
    float dtb;
  };

  printf("Moi nhap so sinh vien: ");
  scanf("%d", &n);

  struct SinhVien sv[n + 1];
  for (i = 0; i < n; i++) 
  {
    printf("\nMoi nhap thong tin sinh vien thu %d\n", i + 1);
    printf("Ma so sinh vien: ");
    scanf("%d", &sv[i].MSSV);

    printf("Ten: ");
    fflush(stdin);
    if (fgets(sv[i].name, 255, stdin) != NULL)
      sv[i].name[strlen(sv[i].name) -1] = ' ';

    printf("Nganh hoc: ");
    fflush(stdin);
    if (fgets(sv[i].nganhHoc, 255, stdin) != NULL)
      sv[i].nganhHoc[strlen(sv[i].nganhHoc) -1] = ' ';

    printf("Diem trung binh: ");
    scanf("%f", &sv[i].dtb);
  }

  printf("Danh sach sinh vien gom:\n");
  for (i = 0; i < n; i++)
  {
    printf("\n");
    printf("Ma so sinh vien thu %d la: %d\n", i + 1, sv[i].MSSV);
    printf("Ten sinh vien thu %d la: %s\n", i + 1, sv[i].name);
    printf("Nghanh hoc sinh vien thu %d la: %s\n", i + 1, sv[i].nganhHoc);
    printf("Diem trung binh sinh vien thu %d la: %g\n", i + 1, sv[i].dtb);
  }
  return 0;
}
